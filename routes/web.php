<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
<<<<<<< HEAD
=======
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
>>>>>>> 67e7d23920c5db084883e584666420a7b11a429c
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

<<<<<<< HEAD
Route::get('/', function () {
    return Inertia::render('Home/index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('Home');

Route::middleware(['auth', 'role:owner'])->group(function () {
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
function getProperties(): array
{
    return [
        [
            'name' => 'Villa Pondok Jabuk',
            'location' => 'Batuaa, Samarinda',
            'price' => 'Rp. 2.100.000,00',
            'old_price' => 'Total 2.210.000,00',
            'rating' => '8/10 Memuaskan',
            'review_count' => '12rb ulasan',
            'stars' => 4,
            'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85',
            'thumbs' => [
                'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=400&q=85',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=85',
            ],
            'facilities' => ['Fasilitas Bisnis', 'Kolam Renang', 'Aksesibel bagi penyandang disabilitas'],
            'details' => [
                'Waktu Check-in / Check-out' => 'Check-in: 15:00 • Check-out: Sebelum 12:00',
                'Fasilitas Populer' => 'AC, Kolam renang, Billard, Parkir, WiFi',
                'Check-out' => 'Dari jam 15:00 - Sampai jam 12:00',
                'Jarak ke pusat Kota' => '1,5 km',
                'Area Populer' => 'Dekat Mall SCP (2.1 km)',
                'Kamar yang tersedia' => '4 Kamar (2 kamar single bed & 2 kamar double bed)',
                'Lantai yang tersedia' => '2 Lantai',
            ],
        ],
        [
            'name' => 'Villa Pondok Jabuk',
            'location' => 'Batuaa, Samarinda',
            'price' => 'Rp. 2.100.000,00',
            'old_price' => 'Total 2.210.000,00',
            'rating' => '8/10 Memuaskan',
            'review_count' => '12rb ulasan',
            'stars' => 4,
            'image' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=900&q=85',
            'thumbs' => [
                'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=400&q=85',
                'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=400&q=85',
            ],
            'facilities' => ['Kolam Renang', 'Dekat Pasar Pagi', 'Pemandangan Indah'],
            'details' => [
                'Waktu Check-in / Check-out' => 'Check-in: 15:00 • Check-out: Sebelum 12:00',
                'Fasilitas Populer' => 'Kolam renang, Layanan kebersihan, Parkir',
                'Check-out' => 'Dari jam 15:00 - Sampai jam 12:00',
                'Jarak ke pusat Kota' => '1,8 km',
                'Area Populer' => 'Dekat Mall SCP (2.1 km)',
                'Kamar yang tersedia' => '3 Kamar (1 kamar single bed & 2 kamar double bed)',
                'Lantai yang tersedia' => '2 Lantai',
            ],
        ],
        [
            'name' => 'Homestay Garden',
            'location' => 'Samarinda Seberang',
            'price' => 'Rp. 1.150.000,00',
            'old_price' => 'Total 1.250.000,00',
            'rating' => '7/10 Memuaskan',
            'review_count' => '12rb ulasan',
            'stars' => 3,
            'image' => 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=85',
            'thumbs' => [
                'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=85',
                'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=400&q=85',
            ],
            'facilities' => ['WiFi', 'Dekat Mall', 'Dapur lengkap'],
            'details' => [
                'Waktu Check-in / Check-out' => 'Check-in: 15:00 • Check-out: Sebelum 12:00',
                'Fasilitas Populer' => 'WiFi, Dapur lengkap, Parkir',
                'Jarak ke pusat Kota' => '2,1 km',
                'Area Populer' => 'Dekat Mall SCP (2.1 km)',
                'Kamar yang tersedia' => '5 Kamar (3 kamar single bed & 2 kamar double bed)',
                'Lantai yang tersedia' => '1 Lantai',
            ],
        ],
    ];
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat Anda mendaftarkan rute-rute aplikasi Anda.
|
*/

// Halaman Utama / Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Properti (Daftar)
Route::get('/properti', function (Request $request) {
    return view('properties.index', [
        'properties' => getProperties(),
        'keyword' => $request->query('keyword'),
    ]);
})->name('properties.index');

Route::get('/properti/{property}', function (string $property) {
    $properties = getProperties();

    if (! isset($properties[$property])) {
        abort(404);
    }

    return view('properties.show', [
        'property' => $properties[$property],
        'propertyId' => $property,
    ]);
})->whereNumber('property')->name('properties.show');

// Switch Bahasa (Layanan Internasionalisasi)
Route::get('/lang/{locale}', function (string $locale): RedirectResponse {
    session()->put('locale', $locale);

    return redirect()->back();
})->whereIn('locale', ['id', 'en'])->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Rute Autentikasi (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Halaman & Proses Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Halaman & Proses Register
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // Halaman Dashboard (Inertia)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
>>>>>>> 67e7d23920c5db084883e584666420a7b11a429c

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
