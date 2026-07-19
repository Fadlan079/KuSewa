<template>
    <!-- Skeleton satu kartu aset, ukuran sama dengan kartu aslinya -->
    <div class="flex-none w-[150px] sm:w-[180px] md:w-[200px] lg:w-[220px] snap-start flex flex-col animate-pulse">

        <!-- Gambar skeleton (aspect 5:7) -->
        <div class="aspect-[5/7] rounded-xl bg-gradient-to-br from-gray-200 via-gray-100 to-gray-200 mb-3 relative overflow-hidden">
            <!-- Shimmer sweep -->
            <div class="absolute inset-0 -translate-x-full animate-shimmer bg-gradient-to-r from-transparent via-white/60 to-transparent"></div>

            <!-- Badge skeleton kiri atas -->
            <div class="absolute top-2.5 left-2.5 h-5 w-14 bg-white/50 rounded"></div>
            <!-- Heart skeleton kanan atas -->
            <div class="absolute top-2 right-2 w-6 h-6 rounded-full bg-white/50"></div>
        </div>

        <!-- Teks skeleton -->
        <div class="flex flex-col gap-2 px-0.5">
            <!-- Judul baris 1 -->
            <div class="h-3.5 rounded bg-gray-200 w-4/5"></div>
            <!-- Judul baris 2 -->
            <div class="h-3 rounded bg-gray-200 w-3/5"></div>
            <!-- Lokasi -->
            <div class="h-3 rounded bg-gray-100 w-2/3 mt-0.5"></div>
            <!-- Harga -->
            <div class="h-4 rounded bg-gray-200 w-3/4 mt-1"></div>
        </div>
    </div>
</template>

<style scoped>
@keyframes shimmer {
    100% { transform: translateX(100%); }
}
.animate-shimmer {
    animation: shimmer 1.5s infinite;
}
</style>
