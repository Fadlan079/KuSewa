@extends('layouts.app')

@section('title', $property['name'] . ' - Detail Properti')

@section('content')
<main class="min-h-screen bg-slate-50 pb-20 pt-8 font-sans text-slate-900">
  <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
      <div>
        <p class="text-sm font-medium text-slate-500">Detail Properti</p>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900">{{ $property['name'] }}</h1>
        <p class="mt-2 text-sm text-slate-600">{{ $property['location'] }}</p>
      </div>
      <div class="text-right">
        <p class="text-sm font-medium text-slate-900">{{ $property['price'] }}</p>
        <p class="text-xs text-slate-500">{{ $property['old_price'] }}</p>
      </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[2fr_1fr]">
      <section class="space-y-6">
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
          <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="w-full object-cover">
        </div>

        <div class="grid gap-3 sm:grid-cols-2">
          @foreach ($property['thumbs'] as $thumb)
          <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
            <img src="{{ $thumb }}" alt="{{ $property['name'] }}" class="w-full object-cover">
          </div>
          @endforeach
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
          <h2 class="text-lg font-bold text-slate-900">Informasi Umum</h2>
          <div class="mt-4 space-y-4 text-sm text-slate-600">
            @foreach ($property['details'] as $label => $value)
            <div class="flex justify-between gap-6">
              <span class="font-medium text-slate-700">{{ $label }}</span>
              <span class="text-right text-slate-500">{{ $value }}</span>
            </div>
            @endforeach
          </div>
        </div>
      </section>

      <aside class="space-y-6">
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
          <h3 class="text-base font-bold text-slate-900">Fasilitas Utama</h3>
          <div class="mt-4 space-y-3 text-sm text-slate-600">
            @foreach ($property['facilities'] as $facility)
            <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3">
              <span class="text-[#fec107]">•</span>
              <span>{{ $facility }}</span>
            </div>
            @endforeach
          </div>
        </div>

        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
          <h3 class="text-base font-bold text-slate-900">Aksi</h3>
          <div class="mt-4 space-y-3">
            <a href="#" class="block rounded-full bg-[#fec107] px-4 py-3 text-center text-sm font-bold text-white transition hover:bg-amber-500">Pesan Sekarang</a>
            <a href="{{ route('properties.index') }}" class="block rounded-full border border-slate-300 bg-white px-4 py-3 text-center text-sm font-bold text-slate-700 transition hover:bg-slate-50">Kembali ke Daftar</a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</main>
@endsection
