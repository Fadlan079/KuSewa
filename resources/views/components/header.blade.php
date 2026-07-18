<nav class="bg-white sticky top-0 z-50 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
      <a href="{{ route('home') }}" class="flex items-center">
        <img src="{{ asset('logo navbar.png') }}" alt="KuSewa" class="h-10 w-auto object-contain">
      </a>
    </div>

    <!-- Desktop Navigation -->
    <div class="hidden md:flex items-center gap-10 font-semibold text-[15px] text-gray-800">
      <a href="{{ route('home') }}" class="hover:text-yellow-500 transition-colors duration-200">{{ __('Beranda') }}</a>
      <a href="{{ route('home') }}#about" class="hover:text-yellow-500 transition-colors duration-200">{{ __('Tentang Kami') }}</a>
      <a href="{{ route('home') }}#services" class="hover:text-yellow-500 transition-colors duration-200">{{ __('Layanan') }}</a>
      <a href="{{ route('properties.index') }}" class="hover:text-yellow-500 transition-colors duration-200">{{ __('Cari Properti') }}</a>

      <!-- Search Icon -->
      <details class="relative ml-2 group">
        <summary aria-label="{{ __('Cari Properti') }}"
          class="list-none cursor-pointer hover:text-yellow-500 transition-colors duration-200 [&::-webkit-details-marker]:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
              d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
          </svg>
        </summary>
        <div class="absolute right-0 top-full mt-4 w-80 rounded-2xl border border-gray-100 bg-white p-4 shadow-xl z-50">
          <p class="mb-3 text-sm font-bold text-gray-800">{{ __('Cari Properti') }}</p>
          <form action="{{ route('home') }}" method="GET" class="flex gap-2">
            <label for="navbar-keyword" class="sr-only">{{ __('Cari Properti') }}</label>
            <input id="navbar-keyword" name="keyword" value="{{ request('keyword') }}" type="search"
              placeholder="Cari nama properti atau lokasi"
              class="min-w-0 flex-1 rounded-xl border border-gray-200 px-3 py-2 text-sm text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-100">
            <button type="submit" aria-label="{{ __('Cari Properti') }}"
              class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#FFC107] text-white transition hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                  d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
              </svg>
            </button>
          </form>
        </div>
      </details>
    </div>

    <!-- Login/Register Button & Mobile Menu Toggle -->
    <div class="flex items-center gap-3">
      <a href="{{ route('login') }}"
        class="hidden md:inline-flex items-center justify-center bg-[#FFC107] hover:bg-yellow-500 transition-colors duration-200 text-white px-6 py-2.5 rounded-lg text-sm font-bold shadow-sm">
        {{ __('Login/Register') }}
      </a>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" aria-expanded="false" aria-controls="mobile-menu"
        class="md:hidden p-2 text-gray-600 hover:text-yellow-500 transition">
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-open" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" id="icon-close" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile menu -->
<div id="mobile-menu" class="md:hidden hidden bg-white border-b absolute w-full z-40 shadow-lg">
  <div class="px-6 py-4 space-y-4 font-semibold text-gray-800">
    <a href="#" class="block hover:text-yellow-500">{{ __('Beranda') }}</a>
    <a href="#" class="block hover:text-yellow-500">{{ __('Tentang Kami') }}</a>
    <a href="#" class="block hover:text-yellow-500">{{ __('Layanan') }}</a>
    <a href="{{ route('properties.index') }}" class="block hover:text-yellow-500">{{ __('Cari Properti') }}</a>
    <div class="pt-4 border-t border-gray-100">
      <a href="{{ route('dashboard') }}"
        class="block text-center bg-[#FFC107] hover:bg-yellow-500 transition-colors text-white px-4 py-3 rounded-lg text-sm font-bold shadow-sm">
        {{ __('Login/Register') }}
      </a>
    </div>
  </div>
</div>

<script>
  (function(){
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');
    if(!btn) return;
    btn.addEventListener('click', function(){
      const isHidden = menu.classList.toggle('hidden');
      btn.setAttribute('aria-expanded', String(!isHidden));
      iconOpen.classList.toggle('hidden');
      iconClose.classList.toggle('hidden');
    });
  })();
</script>