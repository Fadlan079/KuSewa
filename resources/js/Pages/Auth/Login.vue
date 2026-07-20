<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const showPassword = ref(false);

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="min-h-screen relative flex items-center justify-center overflow-hidden">
        <Head title="Login - KuSewa" />

        <!-- Background Image -->
        <div
            class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('/public.png')"
        ></div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/60 to-black/40"></div>

        <!-- Content -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 min-h-screen flex items-center py-16">
            <div class="flex flex-col md:flex-row items-center justify-between w-full gap-10">

                <!-- Left side: Hero text -->
                <div class="flex-1 text-left max-w-lg hidden md:block">
                    <!-- Logo -->
                    <Link :href="route('Home')" class="flex items-center gap-2.5 mb-10">
                        <img src="/kusewa-logo.png" alt="KuSewa Logo" class="h-9 w-auto brightness-0 invert" />
                        <span class="font-bold text-2xl text-white">
                            kusewa<span class="text-[#FFC000]">.id</span>
                        </span>
                    </Link>

                    <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight mb-5">
                        Langkah Mudah<br>
                        Menuju <span class="text-[#FFC000]">Tempat</span><br>
                        Impian.
                    </h1>
                    <p class="text-white/75 text-base leading-relaxed max-w-sm">
                        Menghubungkan Anda dengan properti sewaan terbaik dan terverifikasi di seluruh Indonesia. Proses transparan, transaksi aman.
                    </p>

                    <!-- Features -->
                    <div class="mt-8 flex flex-col gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[#FFC000]/20 border border-[#FFC000]/40 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-shield-halved text-[#FFC000] text-xs"></i>
                            </div>
                            <span class="text-white/70 text-sm">Properti terverifikasi & terpercaya</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[#FFC000]/20 border border-[#FFC000]/40 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-map-location-dot text-[#FFC000] text-xs"></i>
                            </div>
                            <span class="text-white/70 text-sm">Lokasi strategis di seluruh Indonesia</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-[#FFC000]/20 border border-[#FFC000]/40 flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-handshake text-[#FFC000] text-xs"></i>
                            </div>
                            <span class="text-white/70 text-sm">Proses sewa mudah & transparan</span>
                        </div>
                    </div>
                </div>

                <!-- Right side: Login Form Card -->
                <div class="w-full max-w-[400px] flex-shrink-0">
                    <!-- Mobile Logo -->
                    <div class="md:hidden text-center mb-6">
                        <Link :href="route('Home')" class="inline-flex items-center gap-2">
                            <img src="/kusewa-logo.png" alt="KuSewa Logo" class="h-8 w-auto brightness-0 invert" />
                            <span class="font-bold text-xl text-white">
                                kusewa<span class="text-[#FFC000]">.id</span>
                            </span>
                        </Link>
                    </div>

                    <div class="bg-white rounded-2xl shadow-2xl p-8">
                        <!-- Card Header -->
                        <div class="text-center mb-7">
                            <div class="inline-flex items-center justify-center w-12 h-12 bg-[#FFC000]/10 rounded-xl mb-3">
                                <img src="/kusewa-logo.png" alt="KuSewa" class="h-7 w-auto" />
                            </div>
                            <h2 class="text-2xl font-bold text-[#0A2540]">Login</h2>
                            <p class="text-[#6C757D] text-sm mt-1">Selamat datang kembali!</p>
                        </div>

                        <!-- Status Message -->
                        <div v-if="status" class="mb-5 p-3 rounded-lg bg-green-50 border border-green-200">
                            <p class="text-sm font-medium text-green-700 flex items-center gap-2">
                                <i class="fa-solid fa-circle-check"></i>
                                {{ status }}
                            </p>
                        </div>

                        <form @submit.prevent="submit" class="space-y-5">
                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-[#0A2540] mb-1.5">
                                    Email
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i class="fa-regular fa-envelope text-[#6C757D] text-sm"></i>
                                    </div>
                                    <input
                                        id="email"
                                        type="email"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="johndoe@example.com"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm text-[#0A2540] placeholder-[#6C757D]/60 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#FFC000]/40 focus:border-[#FFC000] transition-all duration-200"
                                        :class="{ 'border-red-400 bg-red-50': form.errors.email }"
                                    />
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.email" />
                            </div>

                            <!-- Password Field -->
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <label for="password" class="block text-sm font-semibold text-[#0A2540]">
                                        Password
                                    </label>
                                    <Link
                                        v-if="canResetPassword"
                                        :href="route('password.request')"
                                        class="text-xs text-[#FFC000] hover:text-[#e6ac00] font-medium transition-colors"
                                    >
                                        Lupa password?
                                    </Link>
                                </div>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                        <i class="fa-solid fa-lock text-[#6C757D] text-sm"></i>
                                    </div>
                                    <input
                                        id="password"
                                        :type="showPassword ? 'text' : 'password'"
                                        v-model="form.password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-11 py-3 border border-gray-200 rounded-xl text-sm text-[#0A2540] placeholder-[#6C757D]/60 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#FFC000]/40 focus:border-[#FFC000] transition-all duration-200"
                                        :class="{ 'border-red-400 bg-red-50': form.errors.password }"
                                    />
                                    <button
                                        type="button"
                                        @click="showPassword = !showPassword"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-[#6C757D] hover:text-[#0A2540] transition-colors"
                                    >
                                        <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" class="text-sm"></i>
                                    </button>
                                </div>
                                <InputError class="mt-1.5" :message="form.errors.password" />
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center gap-2.5">
                                <input
                                    id="remember"
                                    type="checkbox"
                                    v-model="form.remember"
                                    class="w-4 h-4 rounded border-gray-300 text-[#FFC000] focus:ring-[#FFC000]/40 cursor-pointer accent-[#FFC000]"
                                />
                                <label for="remember" class="text-sm text-[#6C757D] cursor-pointer select-none">
                                    Ingat saya
                                </label>
                            </div>

                            <!-- Login Button -->
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full py-3.5 bg-[#FFC000] hover:bg-[#e6ac00] text-[#0A2540] font-bold text-sm rounded-xl transition-all duration-200 shadow-md hover:shadow-lg hover:shadow-[#FFC000]/30 active:scale-[0.98] disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                            >
                                <svg v-if="form.processing" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                {{ form.processing ? 'Memproses...' : 'Login' }}
                            </button>

                            <!-- Divider -->
                            <div class="relative flex items-center gap-3">
                                <div class="flex-1 h-px bg-gray-200"></div>
                                <span class="text-xs text-[#6C757D] font-medium">atau masuk dengan</span>
                                <div class="flex-1 h-px bg-gray-200"></div>
                            </div>

                            <!-- Google Login -->
                            <button
                                type="button"
                                class="w-full py-3 border border-gray-200 rounded-xl flex items-center justify-center gap-2.5 text-sm font-medium text-[#0A2540] hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 active:scale-[0.98]"
                            >
                                <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                                Sign in with Google
                            </button>
                        </form>

                        <!-- Footer -->
                        <p class="text-center text-sm text-[#6C757D] mt-6">
                            Belum punya akun?
                            <Link :href="route('register')" class="text-[#FFC000] hover:text-[#e6ac00] font-semibold transition-colors">
                                Daftar
                            </Link>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
