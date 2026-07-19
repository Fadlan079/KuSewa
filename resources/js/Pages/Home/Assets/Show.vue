<script setup>
import { ref, computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    asset: {
        type: Object,
        required: true,
    }
});

// Helper untuk format rupiah
const formatRupiah = (value) => {
    if (!value) return 'Hubungi Pemilik';
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0
    }).format(value);
};

const periodLabel = {
    hour: 'jam',
    day: 'hari',
    week: 'minggu',
    month: 'bulan',
    year: 'tahun'
};

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

// Mengelola Galeri Foto
const defaultImage = 'https://via.placeholder.com/800x600?text=No+Image+Available';
const allImages = computed(() => {
    if (props.asset.images && props.asset.images.length > 0) {
        return props.asset.images.map(img => img.image_url);
    }
    return [defaultImage];
});

const mainImage = computed(() => allImages.value[0]);
const gridImages = computed(() => allImages.value.slice(1, 5)); // Maksimal 4 gambar untuk grid kecil

const showGalleryModal = ref(false);

// Menghitung harga termurah untuk ditampilkan di card booking
const lowestPrice = computed(() => {
    if (!props.asset.pricings || props.asset.pricings.length === 0) return null;
    return props.asset.pricings.reduce((min, p) => p.price < min.price ? p : min, props.asset.pricings[0]);
});

// Fasilitas & Spesifikasi
const specification = computed(() => props.asset.detail || {});
const facilities = computed(() => {
    return Array.isArray(specification.value.facility) 
        ? specification.value.facility 
        : (specification.value.fasilitas || []);
});
const getSpecKeys = computed(() => {
    const spec = { ...specification.value };
    delete spec.facility;
    delete spec.fasilitas;
    return Object.keys(spec);
});

// Form Booking (persiapan)
const form = useForm({
    asset_id: props.asset.id,
    pricing_id: lowestPrice.value ? lowestPrice.value.id : null,
});

const submitBooking = () => {
    form.get(route('booking.create', { asset: props.asset.id })); // Sesuaikan dengan route Anda nanti
};

</script>

<template>
    <Head :title="asset.title || 'Detail Aset'" />

    <!-- Gallery Modal (Lightbox sederhana) -->
    <div v-if="showGalleryModal" class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center p-4 sm:p-10">
        <button @click="showGalleryModal = false" class="absolute top-6 right-6 text-white bg-white/10 hover:bg-white/20 p-3 rounded-full transition">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
        <div class="w-full max-w-5xl max-h-full overflow-y-auto no-scrollbar grid grid-cols-1 md:grid-cols-2 gap-4">
            <img v-for="(img, idx) in allImages" :key="idx" :src="img" class="w-full h-auto rounded-xl shadow-lg object-cover" />
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-[#0A2540] font-sans">
        
        <!-- Breadcrumb / Tombol Kembali -->
        <Link
            href="/"
            class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-[#FFC000] transition-colors mb-6"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Daftar
        </Link>

        <!-- TITLE & HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-2">{{ asset.title }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-sm font-medium text-gray-600">
                <div class="flex items-center gap-1.5 text-[#FFC000] bg-[#FFC000]/10 px-3 py-1 rounded-full text-xs font-bold">
                    <i v-if="asset.category?.icon" :class="asset.category.icon"></i>
                    {{ asset.category?.name || 'Kategori Umum' }}
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-star text-[#FFC000]"></i>
                    <span class="text-[#0A2540] font-bold">{{ parseFloat(asset.reviews_avg_rating || 0).toFixed(1) }}</span>
                    <span class="text-gray-500 underline decoration-gray-300">· {{ asset.reviews_count || 0 }} Ulasan</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-location-dot text-gray-400"></i>
                    <span class="underline decoration-gray-300">{{ asset.city }}, {{ asset.province }}</span>
                </div>
            </div>
        </div>

        <!-- HERO GALLERY GRID -->
        <div class="relative rounded-2xl overflow-hidden mb-12 h-[300px] sm:h-[400px] md:h-[500px] flex gap-2">
            <!-- Left Large Image -->
            <div class="w-full md:w-1/2 h-full cursor-pointer hover:opacity-95 transition" @click="showGalleryModal = true">
                <img :src="mainImage" class="w-full h-full object-cover" alt="Main Image" />
            </div>
            
            <!-- Right Small Images Grid (Desktop only) -->
            <div class="hidden md:grid w-1/2 h-full grid-cols-2 grid-rows-2 gap-2">
                <div v-for="(img, index) in gridImages" :key="index" class="relative h-full w-full cursor-pointer overflow-hidden group" @click="showGalleryModal = true">
                    <img :src="img" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" :alt="`Gallery image ${index+1}`" />
                    <!-- Tampilkan overlay pada gambar terakhir jika gambar lebih dari 5 -->
                    <div v-if="index === 3 && allImages.length > 5" class="absolute inset-0 bg-black/40 flex items-center justify-center text-white font-bold text-lg">
                        +{{ allImages.length - 5 }} Foto
                    </div>
                </div>
                <!-- Placeholder jika gambar kurang -->
                <div v-for="n in (4 - gridImages.length)" :key="'ph-'+n" class="bg-gray-100 h-full w-full"></div>
            </div>

            <!-- Floating Show All Button -->
            <button @click="showGalleryModal = true" class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-xl text-sm font-bold shadow-lg border border-gray-200 hover:bg-gray-50 transition z-10 flex items-center gap-2">
                <i class="fa-solid fa-images"></i> Tampilkan semua foto
            </button>
        </div>

        <!-- CONTENT LAYOUT (Kiri: Detail, Kanan: Booking Card) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- KIRI (Detail) -->
            <div class="lg:col-span-2 space-y-10">
                
                <!-- Info Host -->
                <div class="flex items-center justify-between pb-8 border-b border-gray-200">
                    <div>
                        <h2 class="text-xl font-extrabold mb-1">Disewakan oleh {{ asset.ownerProfile?.user?.name || 'Anonim' }}</h2>
                        <p class="text-sm text-gray-500">Status Aset: <span class="font-bold text-[#FFC000] capitalize">{{ asset.status }}</span></p>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-gray-200 overflow-hidden shrink-0">
                        <img v-if="asset.ownerProfile?.avatar" :src="asset.ownerProfile.avatar" class="w-full h-full object-cover" />
                        <div v-else class="w-full h-full flex items-center justify-center bg-[#0A2540] text-white font-bold text-xl">
                            {{ asset.ownerProfile?.user?.name?.charAt(0) || 'O' }}
                        </div>
                    </div>
                </div>

                <!-- Spesifikasi Tambahan (JSON) -->
                <div v-if="getSpecKeys.length > 0" class="py-6 border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Informasi Umum</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-6 gap-x-4">
                        <div v-for="key in getSpecKeys" :key="key" class="flex flex-col">
                            <span class="text-gray-500 text-sm capitalize mb-1">{{ key.replace(/_/g, ' ') }}</span>
                            <span class="font-bold text-[#0A2540]">{{ specification[key] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="py-6 border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Tentang Aset Ini</h3>
                    <div class="text-gray-600 leading-relaxed whitespace-pre-line text-justify">
                        {{ asset.description }}
                    </div>
                </div>

                <!-- Fasilitas Utama -->
                <div v-if="facilities.length > 0" class="py-6 border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Fasilitas Utama</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div v-for="(fac, idx) in facilities" :key="idx" class="flex items-center gap-3 text-gray-700 font-medium">
                            <i class="fa-solid fa-check text-green-500"></i>
                            <span class="capitalize">{{ fac }}</span>
                        </div>
                    </div>
                </div>

                <!-- Lokasi Map Placeholder -->
                <div class="py-6 border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">Lokasi</h3>
                    <p class="text-gray-600 mb-4">{{ asset.address }}, {{ asset.city }}, {{ asset.province }}</p>
                    <div class="w-full h-64 bg-gray-200 rounded-xl overflow-hidden relative flex items-center justify-center">
                        <div class="absolute inset-0 bg-cover bg-center opacity-40" style="background-image: url('https://map.viamichelin.com/map/carte?map=viamichelin&z=10&lat=-0.502&lon=117.153&width=800&height=400&format=png&version=latest&layer=background')"></div>
                        <div class="z-10 flex flex-col items-center bg-white/90 p-4 rounded-xl shadow-lg">
                            <i class="fa-solid fa-location-dot text-red-500 text-3xl mb-2"></i>
                            <span class="font-bold">Peta belum diintegrasikan</span>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="py-6">
                    <div class="flex items-center gap-4 mb-8">
                        <i class="fa-solid fa-star text-3xl text-[#FFC000]"></i>
                        <h2 class="text-2xl font-extrabold">
                            {{ parseFloat(asset.reviews_avg_rating || 0).toFixed(1) }} · {{ asset.reviews_count || 0 }} ulasan
                        </h2>
                    </div>

                    <div v-if="asset.reviews && asset.reviews.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div v-for="review in asset.reviews" :key="review.id" class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden shrink-0 flex items-center justify-center font-bold text-gray-500">
                                    <img v-if="review.user?.profile_photo" :src="review.user.profile_photo" class="w-full h-full object-cover" />
                                    <span v-else>{{ review.user?.name?.charAt(0) || 'U' }}</span>
                                </div>
                                <div>
                                    <h5 class="font-bold text-sm">{{ review.user?.name || 'Anonim' }}</h5>
                                    <span class="text-xs text-gray-500">{{ formatDate(review.created_at) }}</span>
                                </div>
                            </div>
                            <div class="flex text-[#FFC000] text-xs">
                                <i v-for="n in 5" :key="n" :class="n <= review.rating ? 'fa-solid fa-star' : 'fa-regular fa-star text-gray-300'"></i>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                {{ review.comment }}
                            </p>
                        </div>
                    </div>
                    <div v-else class="text-center py-10 px-4 bg-gray-50 rounded-2xl">
                        <i class="fa-regular fa-comment text-3xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500 font-medium">Belum ada ulasan.</p>
                    </div>
                </div>

            </div>

            <!-- KANAN (Booking Sticky Card) -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 bg-white border border-gray-200 shadow-2xl shadow-gray-200/50 rounded-2xl p-6">
                    <!-- Header Harga Card -->
                    <div class="flex items-end gap-1 mb-6">
                        <span class="text-2xl font-extrabold text-[#0A2540]">{{ formatRupiah(lowestPrice?.price) }}</span>
                        <span class="text-gray-500 mb-1">/ {{ lowestPrice ? periodLabel[lowestPrice.period] : 'opsi' }}</span>
                    </div>

                    <!-- Pilihan Harga Lain -->
                    <div v-if="asset.pricings && asset.pricings.length > 0" class="mb-6 space-y-2">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Opsi Sewa Tersedia</h4>
                        <label v-for="price in asset.pricings" :key="price.id" 
                               class="flex justify-between items-center p-3 rounded-xl border-2 cursor-pointer transition-all"
                               :class="form.pricing_id === price.id ? 'border-[#FFC000] bg-[#FFC000]/5' : 'border-gray-100 hover:border-gray-300'">
                            <div class="flex items-center gap-3">
                                <input type="radio" :value="price.id" v-model="form.pricing_id" class="w-4 h-4 text-[#FFC000] focus:ring-[#FFC000]" />
                                <span class="text-sm font-semibold capitalize">{{ periodLabel[price.period] }}</span>
                            </div>
                            <span class="text-sm font-bold">{{ formatRupiah(price.price) }}</span>
                        </label>
                    </div>

                    <!-- Tombol Pesan -->
                    <button 
                        @click="submitBooking"
                        :disabled="asset.status !== 'active' || !asset.pricings.length"
                        class="w-full py-4 bg-[#FFC000] hover:bg-[#e6ad00] text-[#0A2540] font-extrabold rounded-xl transition-all shadow-lg shadow-[#FFC000]/20 flex justify-center items-center gap-2 text-lg disabled:opacity-50 disabled:cursor-not-allowed">
                        Pesan Sekarang
                    </button>
                    
                    <p v-if="asset.status !== 'active'" class="text-center text-red-500 text-xs font-bold mt-3">Aset ini sedang tidak tersedia.</p>
                    <p class="text-center text-gray-400 text-xs mt-4">Anda belum dikenakan biaya apapun.</p>

                    <hr class="my-6 border-gray-100" />
                    
                    <!-- Ringkasan Info (Opsional untuk card) -->
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="underline">Hubungi Pemilik</span>
                        <i class="fa-solid fa-message"></i>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<style scoped>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
