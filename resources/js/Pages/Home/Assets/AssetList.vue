<script setup>
import { computed } from 'vue';
import AssetCardSkeleton from '@/Components/UI/AssetCardSkeleton.vue';
import LazyAssetCard from '@/Components/UI/LazyAssetCard.vue';

const props = defineProps({
    categories: {
        type: Array,
        required: true,
        default: () => []
    }
});

// Computed: kategori yang punya aset
const visibleCategories = computed(() =>
    props.categories.filter(c => c.assets && c.assets.length > 0)
);

// Apakah data sudah ada (bukan array kosong)
const isLoaded = computed(() => props.categories.length > 0);

const toggleFavorite = (asset) => {
    asset.isFavorite = !asset.isFavorite;
};

const formatRupiah = (value) => {
    if (!value) return 'Hubungi Pemilik';
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(value);
};

const periodLabel = {
    hour: 'jam', day: 'hari',
    week: 'minggu', month: 'bulan', year: 'tahun'
};

// Skeleton sections: tampilkan 3 baris skeleton
const skeletonSections = 3;
// Jumlah kartu skeleton per baris
const skeletonCards = 6;
</script>

<template>
    <div class="w-full py-8 sm:py-10 space-y-10 sm:space-y-12 text-[#0A2540] font-sans overflow-x-hidden">

        <!-- ========== SKELETON (saat data belum ada) ========== -->
        <template v-if="!isLoaded">
            <section
                v-for="s in skeletonSections"
                :key="'sk-' + s"
                class="pl-4 sm:pl-6 lg:pl-8 animate-pulse"
            >
                <!-- Header skeleton -->
                <div class="flex justify-between items-center mb-4 pr-4 sm:pr-6 lg:pr-8">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded bg-gray-200"></div>
                        <div class="h-6 w-32 rounded-lg bg-gray-200"></div>
                    </div>
                    <div class="h-4 w-16 rounded bg-gray-100"></div>
                </div>

                <!-- Kartu skeleton horizontal -->
                <div class="flex gap-3 sm:gap-4 pb-6 pt-2 overflow-hidden pr-4 sm:pr-6 lg:pr-8">
                    <AssetCardSkeleton v-for="c in skeletonCards" :key="c" />
                </div>
            </section>
        </template>

        <!-- ========== DATA NYATA ========== -->
        <template v-else>
            <template v-for="category in visibleCategories" :key="category.id">
                <section class="pl-4 sm:pl-6 lg:pl-8">

                    <!-- Section Header -->
                    <div class="flex justify-between items-end mb-4 pr-4 sm:pr-6 lg:pr-8">
                        <div class="flex items-center gap-2">
                            <i v-if="category.icon" :class="[category.icon, 'text-[#FFC000] text-base']"></i>
                            <h2 class="text-lg sm:text-xl md:text-2xl font-extrabold tracking-tight">{{ category.name }}</h2>
                        </div>
                        <a href="#" class="text-xs sm:text-sm font-bold text-[#FFC000] hover:text-[#e6ad00] transition-colors flex items-center gap-1">
                            <span>Lihat Semua</span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>

                    <!-- Horizontal Scroll -->
                    <div class="flex overflow-x-auto gap-3 sm:gap-4 pb-6 pt-2 snap-x snap-mandatory no-scrollbar pr-4 sm:pr-6 lg:pr-8">

                        <LazyAssetCard
                            v-for="asset in category.assets"
                            :key="asset.id"
                            :asset="asset"
                            :categoryName="category.name"
                        />
                    </div>

                </section>
            </template>
        </template>

    </div>
</template>

<style scoped>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
