@extends('layouts.app')

@section('title', 'Daftar Properti - KuSewa')

@section('content')
  @php
    $properties = [
      [
        'name' => 'Villa Pondok Jatibuk',
        'location' => 'Seminyak, Bali',
        'price' => 'Rp 2.100.000,00',
        'old_price' => 'Rp 2.500.000,00',
        'rating' => '4.9',
        'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85',
        'thumbs' => [
          'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=400&q=85',
          'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=85',
        ],
      ],
      [
        'name' => 'Villa Pondok Jatibuk',
        'location' => 'Canggu, Bali',
        'price' => 'Rp 2.100.000,00',
        'old_price' => 'Rp 2.500.000,00',
        'rating' => '4.8',
        'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=900&q=85',
        'thumbs' => [
          'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=400&q=85',
          'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=400&q=85',
        ],
      ],
      [
        'name' => 'Homestay Garden',
        'location' => 'Dago, Bandung',
        'price' => 'Rp 1.150.000,00',
        'old_price' => 'Rp 1.450.000,00',
        'rating' => '4.7',
        'image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=85',
        'thumbs' => [
          'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=85',
          'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=400&q=85',
        ],
      ],
      [
        'name' => 'Villa Pondok Jatibuk',
        'location' => 'Jakarta Selatan',
        'price' => 'Rp 2.100.000,00',
        'old_price' => 'Rp 2.500.000,00',
        'rating' => '4.9',
        'image' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=900&q=85',
        'thumbs' => [
          'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=400&q=85',
          'https://images.unsplash.com/photo-1600607687644-c7171b42498b?auto=format&fit=crop&w=400&q=85',
        ],
      ],
      [
        'name' => 'Villa Pondok Jatibuk',
        'location' => 'Lembang, Bandung',
        'price' => 'Rp 2.100.000,00',
        'old_price' => 'Rp 2.500.000,00',
        'rating' => '4.8',
        'image' => 'https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&w=900&q=85',
        'thumbs' => [
          'https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=400&q=85',
          'https://images.unsplash.com/photo-1600573472592-401b489a3cdc?auto=format&fit=crop&w=400&q=85',
        ],
      ],
    ];

    $filters = [
      'Rating' => ['5 bintang', '4 bintang ke atas', '3 bintang ke atas', 'Belum dinilai'],
      'Filter populer' => ['Promo liburan', 'Dekat bandara', 'Kolam renang', 'Dekat pusat kota', 'Pemandian air hangat'],
      'Area Populer' => ['Seminyak Kuta', 'Canggu', 'Kepulauan Derawan', 'Kuta Lombok', 'Bali Kuta'],
    ];
  @endphp

  <main class="min-h-screen bg-[#f4f6fb] pb-12 pt-5">
    <div class="mx-auto w-full max-w-6xl px-4">
      <form action="{{ route('properties.index') }}" method="GET" class="mb-5 grid gap-2 rounded-lg border border-slate-200 bg-white p-2 shadow-sm md:grid-cols-[1fr_1fr_1fr_1fr_auto]">
        <label class="sr-only" for="search-property">Jenis Properti</label>
        <select id="search-property" name="type" class="h-9 rounded-md border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 outline-none focus:border-[#FFC107] focus:ring-2 focus:ring-yellow-100">
          <option>Jenis Properti</option>
          <option>Villa</option>
          <option>Rumah</option>
          <option>Apartemen</option>
        </select>

        <label class="sr-only" for="search-location">Lokasi</label>
        <select id="search-location" name="location" class="h-9 rounded-md border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 outline-none focus:border-[#FFC107] focus:ring-2 focus:ring-yellow-100">
          <option>Lokasi</option>
          <option>Bali</option>
          <option>Bandung</option>
          <option>Jakarta</option>
        </select>

        <label class="sr-only" for="search-date">Jadwal</label>
        <select id="search-date" name="date" class="h-9 rounded-md border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 outline-none focus:border-[#FFC107] focus:ring-2 focus:ring-yellow-100">
          <option>Jadwal</option>
          <option>Hari ini</option>
          <option>Minggu ini</option>
          <option>Bulan ini</option>
        </select>

        <label class="sr-only" for="search-price">Harga</label>
        <select id="search-price" name="price" class="h-9 rounded-md border border-slate-200 bg-white px-3 text-xs font-semibold text-slate-600 outline-none focus:border-[#FFC107] focus:ring-2 focus:ring-yellow-100">
          <option>Harga</option>
          <option>Di bawah Rp 1 juta</option>
          <option>Rp 1 juta - Rp 2 juta</option>
          <option>Di atas Rp 2 juta</option>
        </select>

        <button type="submit" class="inline-flex h-9 items-center justify-center rounded-md bg-[#FFC107] px-5 text-slate-900 shadow-sm transition hover:bg-yellow-400" aria-label="Cari properti">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
          </svg>
        </button>
      </form>

      <div class="grid gap-4 lg:grid-cols-[220px_minmax(0,1fr)]">
        <aside class="space-y-4">
          <div class="overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm">
            <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-l+ffc107(115.1889,-8.4095)/115.1889,-8.4095,8,0/500x210?access_token=pk.eyJ1IjoiZXhhbXBsZSIsImEiOiJjbGV4YW1wbGUifQ.example" alt="" class="h-28 w-full bg-yellow-50 object-cover" onerror="this.style.display='none'">
            <div class="grid h-28 place-items-center bg-yellow-50 text-[#FFC107]">
              <svg class="h-12 w-12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 2.25a7.25 7.25 0 00-7.25 7.25c0 5.15 6.35 11.8 6.62 12.08a.9.9 0 001.26 0c.27-.28 6.62-6.93 6.62-12.08A7.25 7.25 0 0012 2.25zm0 10a2.75 2.75 0 110-5.5 2.75 2.75 0 010 5.5z" />
              </svg>
            </div>
          </div>

          <div class="rounded-md border border-slate-200 bg-white p-3 shadow-sm">
            <h2 class="mb-3 text-sm font-bold text-slate-900">Rentang harga</h2>
            <div class="grid grid-cols-2 gap-2">
              <label class="block">
                <span class="mb-1 block text-[11px] font-semibold text-slate-500">Min</span>
                <input type="text" value="Rp 500.000" class="h-8 w-full rounded border border-slate-200 px-2 text-[11px] font-semibold text-slate-700 outline-none focus:border-[#FFC107]">
              </label>
              <label class="block">
                <span class="mb-1 block text-[11px] font-semibold text-slate-500">Max</span>
                <input type="text" value="Rp 5.000.000" class="h-8 w-full rounded border border-slate-200 px-2 text-[11px] font-semibold text-slate-700 outline-none focus:border-[#FFC107]">
              </label>
            </div>
          </div>

          @foreach ($filters as $title => $items)
            <details open class="overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm">
              <summary class="flex cursor-pointer list-none items-center justify-between bg-[#FFC107] px-3 py-2 text-xs font-extrabold text-slate-900 [&::-webkit-details-marker]:hidden">
                {{ $title }}
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M19 9l-7 7-7-7" />
                </svg>
              </summary>
              <div class="space-y-2 p-3">
                @foreach ($items as $item)
                  <label class="flex cursor-pointer items-center gap-2 text-[12px] text-slate-700">
                    <input type="checkbox" class="h-3.5 w-3.5 rounded border-slate-300 text-[#FFC107] focus:ring-yellow-300">
                    <span>{{ $item }}</span>
                  </label>
                @endforeach
                <a href="#" class="mt-2 inline-block text-[11px] font-bold text-slate-700 underline decoration-slate-300 underline-offset-2 hover:text-yellow-600">Lihat selengkapnya</a>
              </div>
            </details>
          @endforeach
        </aside>

        <section class="min-w-0">
          <div class="mb-3 flex flex-col gap-3 rounded-md border border-slate-200 bg-white px-4 py-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
            <div>
              <h1 class="text-base font-extrabold text-slate-900">Semua properti</h1>
              <p class="text-xs font-semibold text-slate-500">{{ count($properties) }} properti ditemukan</p>
            </div>
            <div class="flex flex-wrap items-center gap-2 text-xs font-semibold text-slate-600">
              <a href="#" class="text-yellow-600 hover:text-yellow-700">Lihatkan berdasarkan</a>
              <select class="h-8 rounded-full border border-slate-200 bg-white px-3 text-xs outline-none focus:border-[#FFC107]">
                <option>Harga</option>
                <option>Rating</option>
                <option>Terbaru</option>
              </select>
              <select class="h-8 rounded-full border border-slate-200 bg-white px-3 text-xs outline-none focus:border-[#FFC107]">
                <option>Rating</option>
                <option>Terendah</option>
                <option>Tertinggi</option>
              </select>
            </div>
          </div>

          <div class="space-y-4">
            @foreach ($properties as $property)
              <article class="grid overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md md:grid-cols-[250px_minmax(0,1fr)_190px]">
                <div class="grid h-48 grid-cols-[1.45fr_1fr] gap-1 bg-slate-100 md:h-full">
                  <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="h-full w-full object-cover">
                  <div class="grid grid-rows-2 gap-1">
                    @foreach ($property['thumbs'] as $thumb)
                      <img src="{{ $thumb }}" alt="" class="h-full w-full object-cover">
                    @endforeach
                  </div>
                </div>

                <div class="min-w-0 p-4">
                  <div class="mb-1 flex items-start justify-between gap-3">
                    <h2 class="truncate text-base font-extrabold text-slate-900">{{ $property['name'] }}</h2>
                    <span class="shrink-0 rounded bg-yellow-50 px-2 py-1 text-[11px] font-bold text-yellow-700">Villa</span>
                  </div>

                  <div class="mb-2 flex items-center gap-1 text-xs font-bold text-yellow-500">
                    @for ($i = 0; $i < 5; $i++)
                      <span>&#9733;</span>
                    @endfor
                    <span class="ml-1 text-slate-500">{{ $property['rating'] }}</span>
                  </div>

                  <p class="mb-3 flex items-center gap-1 text-xs font-semibold text-slate-500">
                    <svg class="h-3.5 w-3.5 text-[#FFC107]" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M12 2.25a7.25 7.25 0 00-7.25 7.25c0 5.15 6.35 11.8 6.62 12.08a.9.9 0 001.26 0c.27-.28 6.62-6.93 6.62-12.08A7.25 7.25 0 0012 2.25zm0 10a2.75 2.75 0 110-5.5 2.75 2.75 0 010 5.5z" />
                    </svg>
                    {{ $property['location'] }}
                  </p>

                  <div class="mb-3 flex flex-wrap gap-1.5">
                    @foreach (['AC', 'WiFi', '3 kamar', 'Dapur'] as $facility)
                      <span class="rounded border border-slate-200 bg-slate-50 px-2 py-1 text-[11px] font-semibold text-slate-600">{{ $facility }}</span>
                    @endforeach
                  </div>

                  <p class="line-clamp-2 text-xs leading-5 text-slate-500">Properti nyaman dengan akses mudah ke area populer, cocok untuk keluarga maupun liburan singkat.</p>
                </div>

                <div class="flex flex-col justify-between border-t border-slate-100 p-4 md:border-l md:border-t-0">
                  <button type="button" class="ml-auto inline-flex h-8 w-8 items-center justify-center rounded-full border border-slate-200 text-slate-400 transition hover:border-yellow-300 hover:text-yellow-500" aria-label="Simpan properti">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.32 6.32a4.5 4.5 0 016.36 0L12 7.64l1.32-1.32a4.5 4.5 0 116.36 6.36L12 20.36l-7.68-7.68a4.5 4.5 0 010-6.36z" />
                    </svg>
                  </button>

                  <div class="mt-4 md:mt-0">
                    <p class="text-[11px] font-semibold text-slate-400 line-through">{{ $property['old_price'] }}</p>
                    <p class="text-base font-extrabold text-[#f0a500]">{{ $property['price'] }}</p>
                    <p class="mt-1 text-[11px] font-semibold text-emerald-600">Termasuk pajak dan biaya</p>
                  </div>

                  <a href="#" class="mt-4 inline-flex h-8 items-center justify-center rounded bg-[#FFC107] px-4 text-xs font-extrabold text-slate-900 transition hover:bg-yellow-400">Lihat Detail</a>
                </div>
              </article>
            @endforeach
          </div>
        </section>
      </div>
    </div>
  </main>
@endsection
