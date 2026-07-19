<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import AssetCardSkeleton from './AssetCardSkeleton.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    asset: {
        type: Object,
        required: true
    },
    categoryName: {
        type: String,
        required: true
    }
});

const isIntersecting = ref(false);
const imageLoaded = ref(false);
const elRef = ref(null);

let observer = null;

onMounted(() => {
    observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            isIntersecting.value = true;
            if (observer) {
                observer.disconnect();
            }
        }
    }, {
        // Render 200px sebelum masuk viewport agar perpindahan halus
        rootMargin: '200px'
    });

    if (elRef.value) {
        observer.observe(elRef.value);
    }
});

onUnmounted(() => {
    if (observer) {
        observer.disconnect();
    }
});

const toggleFavorite = () => {
    props.asset.isFavorite = !props.asset.isFavorite;
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
</script>

<template>
    <div ref="elRef" class="flex-none w-[150px] sm:w-[180px] md:w-[200px] lg:w-[220px] snap-start flex flex-col min-h-[260px]">
        <!-- Tampilkan skeleton card jika belum mendekati layar -->
        <AssetCardSkeleton v-if="!isIntersecting" />

        <!-- Render konten kartu sebenarnya saat discroll mendekati layar -->
        <Link v-else :href="route('assets.show', asset.id)" class="w-full flex flex-col group cursor-pointer">
            <!-- GAMBAR ASSET -->
            <div class="aspect-[5/7] relative rounded-xl overflow-visible bg-gray-100 shadow-sm group-hover:shadow-lg transition-shadow duration-300 mb-3">
                <div class="w-full h-full rounded-xl overflow-hidden relative bg-gray-100">

                    <!-- SKELETON INDIVIDUAL GAMBAR (Selama file gambar di-download) -->
                    <div v-if="asset.first_image?.image && !imageLoaded && !asset.imageError"
                         class="absolute inset-0 bg-gradient-to-br from-gray-200 via-gray-100 to-gray-200 animate-pulse z-10">
                        <div class="absolute inset-0 -translate-x-full animate-shimmer bg-gradient-to-r from-transparent via-white/60 to-transparent"></div>
                    </div>

                    <!-- GAMBAR NYATA -->
                    <img
                        v-if="asset.first_image?.image_url && !asset.imageError"
                        :src="asset.first_image.image_url"
                        :alt="asset.title"
                        @load="imageLoaded = true"
                        @error="asset.imageError = true"
                        loading="lazy"
                        decoding="async"
                        class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500"
                        :class="imageLoaded ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                    />

                    <!-- Fallback No Image -->
                    <div
                        v-else
                        class="w-full h-full flex flex-col items-center justify-center bg-gray-100 text-gray-300"
                    >
                        <i class="fa-solid fa-image text-4xl mb-2"></i>
                        <span class="text-xs font-medium">No Image</span>
                    </div>

                    <!-- Gradient atas -->
                    <div class="absolute inset-x-0 top-0 h-16 bg-gradient-to-b from-black/40 to-transparent pointer-events-none z-10"></div>

                    <!-- Badge & Tombol Love -->
                    <div class="absolute top-2 sm:top-2.5 inset-x-2 sm:inset-x-2.5 z-10 flex justify-between items-start">
                        <span class="bg-white/90 text-[#0A2540] text-[10px] sm:text-[11px] font-extrabold px-2 py-0.5 sm:py-1 rounded shadow-sm">
                            {{ categoryName }}
                        </span>

                        <button
                            @click.stop="toggleFavorite"
                            class="w-6 h-6 sm:w-7 sm:h-7 rounded-full bg-black/40 flex items-center justify-center text-white hover:scale-110 transition-transform"
                        >
                            <i
                                :class="asset.isFavorite ? 'fa-solid fa-heart text-red-400' : 'fa-regular fa-heart'"
                                class="text-xs sm:text-sm"
                            ></i>
                        </button>
                    </div>
                </div>

                <!-- Rating Bulat -->
                <div v-if="asset.reviews_avg_rating" class="absolute -bottom-2.5 right-2 sm:right-2.5 z-20">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#FFC000] text-[#0A2540] font-black text-[11px] sm:text-xs flex items-center justify-center shadow-md border-2 border-white">
                        {{ Number(asset.reviews_avg_rating).toFixed(1) }}
                    </div>
                </div>
            </div>

            <!-- Konten Teks -->
            <div class="flex flex-col flex-grow px-0.5">
                <h3 class="font-bold text-xs sm:text-sm leading-snug text-[#0A2540] group-hover:text-[#FFC000] transition-colors line-clamp-2 mb-1">
                    {{ asset.title }}
                </h3>

                <div class="text-[10px] sm:text-[11px] text-gray-500 font-medium mb-1.5 flex items-center gap-1 truncate">
                    <i class="fa-solid fa-location-dot text-[#FFC000] flex-shrink-0"></i>
                    <span class="truncate">
                        {{ [asset.city, asset.address].filter(Boolean).join(', ') || 'Lokasi tidak diketahui' }}
                    </span>
                </div>

                <div class="font-extrabold text-xs sm:text-sm text-[#0A2540] mt-auto pt-1">
                    <template v-if="asset.primary_pricing">
                        {{ formatRupiah(asset.primary_pricing.price) }}
                        <span class="text-[10px] font-normal text-gray-400">
                            /{{ periodLabel[asset.primary_pricing.period] || asset.primary_pricing.period }}
                        </span>
                    </template>
                    <span v-else class="text-[11px] font-medium text-gray-400">Hubungi Pemilik</span>
                </div>
            </div>
        </Link>
    </div>
</template>

<style scoped>
@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}
.animate-shimmer {
    animation: shimmer 1.5s infinite;
}
</style>
