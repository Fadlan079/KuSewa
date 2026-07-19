<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <footer class="w-full font-sans overflow-hidden">

        <!-- ==================== TOP BANNER SECTION ==================== -->
        <div
            class="relative w-full py-8 md:py-12 px-4 sm:px-6 lg:px-16 bg-cover bg-center flex items-center justify-center min-h-[260px] md:min-h-[320px]"
            style="background-image: url('/public.png');"
        >
            <div class="absolute inset-0 bg-black/60"></div>

            <div class="relative z-10 w-full max-w-4xl mx-auto flex flex-col items-center text-center text-white px-2">

                <!-- Penyesuaian ukuran teks base menjadi text-lg dan penambahan whitespace-nowrap -->
                <h2 class="text-lg sm:text-3xl md:text-4xl font-extrabold leading-tight mb-3">
                    <span class="block text-white whitespace-nowrap">Apa Pun Kebutuhan Sewamu,</span>
                    <span class="block text-[#FFC000] whitespace-nowrap">Temukan Semuanya di KuSewa.</span>
                </h2>

                <!-- Penyesuaian ukuran paragraf agar proporsional dengan judul -->
                <p class="text-xs sm:text-base md:text-lg text-gray-200 max-w-3xl leading-relaxed mt-2">
                    Temukan berbagai aset seperti kantor, hunian, dan lahan dengan mudah di KuSewa.
                </p>

            </div>
        </div>

        <!-- ==================== BOTTOM LINKS SECTION ==================== -->
        <div class="bg-secondary w-full pt-16 pb-8 px-6 lg:px-16 text-white">
            <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-10 lg:gap-8">

                <!-- Logo & Social (Col Span 2) -->
                <div class="lg:col-span-2 space-y-10">
                    <!-- Logo -->
                    <div class="text-3xl font-extrabold flex items-center gap-2 text-primary">
                        <img src="/kusewa-logo.png" alt="Logo" width="40" height="40" class="brightness-0 invert">
                        <span class="text-white">Kusewa</span>.id
                    </div>

                    <!-- Media Sosial Vertikal -->
                    <div>
                        <h4 class="font-bold text-lg mb-5">Media Sosial</h4>
                        <div class="flex flex-col gap-4">

                            <!-- Instagram Row -->
                            <a href="https://www.instagram.com/kusewa.id_smd/" class="flex items-center gap-3 group w-fit">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-all duration-300">
                                    <i class="fa-brands fa-instagram text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-300 group-hover:text-[#FFC000] transition-colors">Kusewa.id_smd</span>
                            </a>

                            <!-- Facebook Row -->
                            <a href="https://www.facebook.com/kusewa.id/" class="flex items-center gap-3 group w-fit">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-all duration-300">
                                    <i class="fa-brands fa-facebook-f text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-300 group-hover:text-[#FFC000] transition-colors">kusewa.id</span>
                            </a>

                            <a href="https://wa.me/NOMOR_ANDA" target="_blank" class="flex items-center gap-3 group w-fit">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-all duration-300">
                                    <i class="fa-brands fa-whatsapp text-xl"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-300 group-hover:text-[#FFC000] transition-colors">085350229494</span>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Column 1: Jelajahi -->
                <div>
                    <h4 class="font-bold text-lg mb-5">Jelajahi</h4>
                    <ul class="space-y-3 text-sm text-gray-400 font-medium">
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Cari Aset</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Kategori Aset</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Lokasi Populer</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Aset Terbaru</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Promo</a></li>
                    </ul>
                </div>

                <!-- Column 2: Untuk Pemilik Aset -->
                <div>
                    <h4 class="font-bold text-lg mb-5">Pemilik Aset</h4>
                    <ul class="space-y-3 text-sm text-gray-400 font-medium">
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Daftar Jadi Pemilik</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Cara Menjual/Menyewakan Aset</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Dashboard Pemilik</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Kebijakan Pemilik</a></li>
                    </ul>
                </div>

                <!-- Column 3: Bantuan & Dukungan -->
                <div>
                    <h4 class="font-bold text-lg mb-5">Bantuan & Dukungan</h4>
                    <ul class="space-y-3 text-sm text-gray-400 font-medium">
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Cara Booking</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Cara Pembayaran</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Laporkan Masalah</a></li>
                    </ul>
                </div>

                <!-- Column 4: Perusahaan -->
                <div>
                    <h4 class="font-bold text-lg mb-5">Perusahaan</h4>
                    <ul class="space-y-3 text-sm text-gray-400 font-medium">
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Karier</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-[#FFC000] transition-colors">Kontak</a></li>
                    </ul>
                </div>

            </div>

            <!-- Copyright Layer -->
            <div class="max-w-7xl mx-auto mt-12 md:mt-16 pt-6 md:pt-8 border-t border-gray-700/50 flex flex-col justify-between items-center gap-4 md:gap-0 text-sm text-gray-100 text-center md:text-left">

                <p>&copy; {{ new Date().getFullYear() }} KuSewa. Seluruh hak cipta dilindungi.</p>

            </div>
        </div>

    </footer>
</template>
