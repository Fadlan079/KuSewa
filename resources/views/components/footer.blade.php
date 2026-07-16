<footer class="bg-gray-900 text-gray-400 pt-16 pb-8 border-t border-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
      
      <!-- Company Info -->
      <div class="space-y-4">
        <a href="{{ route('home') }}" class="flex items-center">
          <img src="{{ asset('logo navbar.png') }}" alt="KuSewa" class="h-10 w-auto object-contain brightness-0 invert">
        </a>
        <p class="text-sm text-gray-400 leading-relaxed">
          {{ __('KuSewa adalah platform terpercaya untuk mencari dan menyewakan properti terbaik di Indonesia. Cari apartemen, rumah, dan vila impian Anda tanpa ribet.') }}
        </p>
      </div>

      <!-- Quick Links -->
      <div>
        <h4 class="text-white font-bold text-base mb-4 tracking-wide">{{ __('Navigasi') }}</h4>
        <ul class="space-y-2.5 text-sm">
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Beranda') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Tentang Kami') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Layanan Kami') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Cari Properti') }}</a></li>
        </ul>
      </div>

      <!-- Services / Categories -->
      <div>
        <h4 class="text-white font-bold text-base mb-4 tracking-wide">{{ __('Tipe Properti') }}</h4>
        <ul class="space-y-2.5 text-sm">
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Sewa Apartemen') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Sewa Rumah') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Sewa Vila') }}</a></li>
          <li><a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Ruang Kerja/Kantor') }}</a></li>
        </ul>
      </div>

      <!-- Social Media & Contact -->
      <div>
        <h4 class="text-white font-bold text-base mb-4 tracking-wide">{{ __('Hubungi Kami') }}</h4>
        <p class="text-sm text-gray-400 mb-4">{{ __('Punya pertanyaan? Hubungi kami di support@kusewa.id') }}</p>
        <div class="flex space-x-4">
          <!-- Facebook -->
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 flex items-center justify-center transition-colors duration-200">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
          </a>
          <!-- Instagram -->
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 flex items-center justify-center transition-colors duration-200">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
          </a>
          <!-- Twitter -->
          <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-yellow-400 hover:text-gray-900 flex items-center justify-center transition-colors duration-200">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
          </a>
        </div>
      </div>

    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
      <p>&copy; {{ date('Y') }} KuSewa. {{ __('Hak Cipta Dilindungi Undang-Undang.') }}</p>
      <div class="flex space-x-6 mt-4 md:mt-0">
        <a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Kebijakan Privasi') }}</a>
        <a href="#" class="hover:text-yellow-400 transition-colors duration-200">{{ __('Syarat & Ketentuan') }}</a>
      </div>
    </div>

  </div>
</footer>
