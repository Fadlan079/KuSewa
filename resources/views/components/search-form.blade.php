@php
  $type = request('type');
  $location = request('location');
  $date = request('date');
  $price = request('price');

  $priceLabels = [
    'under-5-million' => __('< Rp 5 Juta'),
    '5-to-15-million' => __('Rp 5 Juta - 15 Juta'),
    'over-15-million' => __('> Rp 15 Juta'),
  ];
@endphp

<form id="property-search" action="{{ route('home') }}" method="GET" data-search-form class="bg-white rounded-[32px] md:rounded-full shadow-2xl w-full max-w-5xl mx-auto border border-gray-100 p-2 scroll-mt-24">
  <div class="flex flex-col md:flex-row items-center divide-y md:divide-y-0 md:divide-x divide-gray-200">
    <details class="search-dropdown flex-1 w-full px-6 py-3 relative group">
      <summary class="flex items-center justify-between gap-3 list-none cursor-pointer [&::-webkit-details-marker]:hidden">
        <span>
          <span class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('Jenis Properti') }}</span>
          <span class="search-dropdown-label block text-sm md:text-[15px] font-bold {{ $type ? 'text-gray-800' : 'text-gray-500' }}">{{ $type ? __($type) : __('Pilih tipe...') }}</span>
        </span>
        <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
      </summary>
      <input type="hidden" name="type" value="{{ $type }}" class="search-dropdown-input">
      <div class="absolute left-3 right-3 top-full mt-2 overflow-hidden rounded-2xl border border-gray-100 bg-white py-2 shadow-xl z-50">
        @foreach (['Apartemen', 'Rumah', 'Vila'] as $option)
          <button type="button" data-search-option data-value="{{ $option }}" class="w-full px-5 py-3 text-left text-sm font-semibold text-gray-700 transition hover:bg-yellow-50 hover:text-yellow-600">{{ __($option) }}</button>
        @endforeach
      </div>
    </details>

    <details class="search-dropdown flex-1 w-full px-6 py-3 relative group">
      <summary class="flex items-center justify-between gap-3 list-none cursor-pointer [&::-webkit-details-marker]:hidden">
        <span>
          <span class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('Lokasi') }}</span>
          <span class="search-dropdown-label block text-sm md:text-[15px] font-bold {{ $location ? 'text-gray-800' : 'text-gray-500' }}">{{ $location ?: __('Pilih lokasi...') }}</span>
        </span>
        <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
      </summary>
      <input type="hidden" name="location" value="{{ $location }}" class="search-dropdown-input">
      <div class="absolute left-3 right-3 top-full mt-2 overflow-hidden rounded-2xl border border-gray-100 bg-white py-2 shadow-xl z-50">
        @foreach (['Jakarta', 'Bali', 'Bandung'] as $option)
          <button type="button" data-search-option data-value="{{ $option }}" class="w-full px-5 py-3 text-left text-sm font-semibold text-gray-700 transition hover:bg-yellow-50 hover:text-yellow-600">{{ __($option) }}</button>
        @endforeach
      </div>
    </details>

    <details class="search-dropdown flex-1 w-full px-6 py-3 relative group">
      <summary class="flex items-center justify-between gap-3 list-none cursor-pointer [&::-webkit-details-marker]:hidden">
        <span>
          <span class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('Jadwal') }}</span>
          <span class="search-dropdown-label block text-sm md:text-[15px] font-bold {{ $date ? 'text-gray-800' : 'text-gray-500' }}">{{ $date ? __($date) : __('Kapan...') }}</span>
        </span>
        <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
      </summary>
      <input type="hidden" name="date" value="{{ $date }}" class="search-dropdown-input">
      <div class="absolute left-3 right-3 top-full mt-2 overflow-hidden rounded-2xl border border-gray-100 bg-white py-2 shadow-xl z-50">
        @foreach (['Bulan ini', 'Bulan Depan'] as $option)
          <button type="button" data-search-option data-value="{{ $option }}" class="w-full px-5 py-3 text-left text-sm font-semibold text-gray-700 transition hover:bg-yellow-50 hover:text-yellow-600">{{ __($option) }}</button>
        @endforeach
      </div>
    </details>

    <details class="search-dropdown flex-1 w-full px-6 py-3 relative group">
      <summary class="flex items-center justify-between gap-3 list-none cursor-pointer [&::-webkit-details-marker]:hidden">
        <span>
          <span class="block text-xs font-bold text-gray-400 mb-1 uppercase tracking-wider">{{ __('Harga') }}</span>
          <span class="search-dropdown-label block text-sm md:text-[15px] font-bold {{ isset($priceLabels[$price]) ? 'text-gray-800' : 'text-gray-500' }}">{{ $priceLabels[$price] ?? __('Batas budget...') }}</span>
        </span>
        <svg class="h-5 w-5 shrink-0 text-gray-500 transition-transform duration-200 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
      </summary>
      <input type="hidden" name="price" value="{{ $price }}" class="search-dropdown-input">
      <div class="absolute left-3 right-3 top-full mt-2 overflow-hidden rounded-2xl border border-gray-100 bg-white py-2 shadow-xl z-50">
        @foreach ($priceLabels as $value => $label)
          <button type="button" data-search-option data-value="{{ $value }}" class="w-full px-5 py-3 text-left text-sm font-semibold text-gray-700 transition hover:bg-yellow-50 hover:text-yellow-600">{{ $label }}</button>
        @endforeach
      </div>
    </details>

    <div class="pl-4 pr-2 py-2 w-full md:w-auto flex justify-center md:justify-end">
      <button type="submit" aria-label="{{ __('Cari Properti') }}" class="flex items-center justify-center bg-[#FFC107] hover:bg-yellow-500 text-white rounded-full w-14 h-14 transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" /></svg>
      </button>
    </div>
  </div>
</form>

<script>
(() => {
  const form = document.querySelector('[data-search-form]');
  if (!form || form.dataset.dropdownReady) return;

  form.dataset.dropdownReady = 'true';

  form.addEventListener('click', (event) => {
    const option = event.target.closest('[data-search-option]');
    if (!option || !form.contains(option)) return;

    const dropdown = option.closest('.search-dropdown');
    const input = dropdown.querySelector('.search-dropdown-input');
    const label = dropdown.querySelector('.search-dropdown-label');

    input.value = option.dataset.value;
    label.textContent = option.textContent.trim();
    label.classList.remove('text-gray-500');
    label.classList.add('text-gray-800');
    dropdown.removeAttribute('open');
  });

  form.addEventListener('toggle', (event) => {
    const openedDropdown = event.target;
    if (!openedDropdown.open || !openedDropdown.classList.contains('search-dropdown')) return;

    form.querySelectorAll('.search-dropdown[open]').forEach((dropdown) => {
      if (dropdown !== openedDropdown) dropdown.removeAttribute('open');
    });
  }, true);
})();
</script>
