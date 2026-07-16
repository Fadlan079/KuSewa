<section class="relative w-full h-[600px] flex items-center">
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1505691723518-36a51a6a1e0a?auto=format&fit=crop&w=1650&q=80');"></div>
  
  <!-- Gradient Overlay -->
  <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
    
  <!-- Language Selector Overlay -->
  <details class="absolute top-6 right-6 md:right-12 z-20 custom-dropdown group">
    <summary class="flex items-center gap-2 bg-black/20 hover:bg-black/40 transition px-3 py-1.5 rounded-full backdrop-blur-sm border border-white/20 cursor-pointer outline-none list-none [&::-webkit-details-marker]:hidden">
      @if(App::getLocale() == 'id')
        <div class="w-5 h-5 rounded-full overflow-hidden flex flex-col shadow-sm">
          <div class="h-1/2 w-full bg-[#FF0000]"></div>
          <div class="h-1/2 w-full bg-white"></div>
        </div>
        <span class="text-white font-semibold text-sm tracking-wide">ID</span>
      @else
        <div class="w-5 h-5 rounded-full overflow-hidden flex items-center justify-center shadow-sm relative bg-[#002060]">
          <span class="text-[7px] text-white font-bold leading-none">EN</span>
        </div>
        <span class="text-white font-semibold text-sm tracking-wide">EN</span>
      @endif
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white opacity-80 transition-transform duration-200 group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    
    <!-- Language Dropdown Menu -->
    <div class="absolute right-0 mt-2 w-32 bg-white rounded-xl shadow-xl border border-gray-100 py-1.5 z-50">
      <a href="{{ route('lang.switch', 'id') }}" class="flex items-center gap-2.5 px-4 py-2.5 hover:bg-yellow-50 text-sm font-semibold text-gray-700 hover:text-yellow-600 transition">
        <div class="w-4 h-4 rounded-full overflow-hidden flex flex-col shadow-sm border border-gray-200">
          <div class="h-1/2 w-full bg-[#FF0000]"></div>
          <div class="h-1/2 w-full bg-white"></div>
        </div>
        Indonesia
      </a>
      <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-2.5 px-4 py-2.5 hover:bg-yellow-50 text-sm font-semibold text-gray-700 hover:text-yellow-600 transition">
        <div class="w-4 h-4 rounded-full overflow-hidden flex items-center justify-center shadow-sm border border-gray-200 bg-[#002060]">
          <span class="text-[6px] text-white font-bold">EN</span>
        </div>
        English
      </a>
    </div>
  </details>

  <div class="container mx-auto px-4 z-10 relative mt-10">
    <div class="max-w-3xl">
      <h1 class="text-5xl md:text-[64px] font-extrabold leading-[1.1] text-white tracking-tight drop-shadow-lg">
        {!! __('Temukan <span class="text-[#FFC107]">Ruang</span> Idealmu, <br>
        <span class="text-[#FFC107]">Sewa</span> Tanpa Ribet') !!}
      </h1>
      <p class="mt-6 text-gray-200 text-lg md:text-xl font-medium max-w-2xl drop-shadow-md leading-relaxed">
        {{ __('Mulai dari hunian nyaman hingga ruang kerja produktif, semua bisa disewa dengan aman, transparan, dan sesuai budget-mu') }}
      </p>
    </div>
  </div>

  <!-- Search Form Container -->
  <div class="absolute left-0 right-0 -bottom-8 px-4 flex justify-center z-30">
    @include('components.search-form')
  </div>
</section>
