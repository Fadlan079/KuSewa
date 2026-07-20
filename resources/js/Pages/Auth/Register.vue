<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
// Pastikan AuthLayout di-import jika tidak diregistrasikan secara global
// import AuthLayout from '@/Layouts/AuthLayout.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    if (!isPasswordStrong.value) {
        form.setError(
            'password',
            'Password belum memenuhi seluruh persyaratan di bawah.'
        );
        return;
    }

    form.clearErrors('password');

    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
const showPassword = ref(false);

const passwordScore = computed(() => {
    const password = form.password;
    let score = 0;

    if (/[A-Z]/.test(password)) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[^A-Za-z0-9]/.test(password)) score++;

    return score;
});

const passwordLevel = computed(() => {
    switch (passwordScore.value) {
        case 0:
        case 1:
            return { label: 'Sangat Lemah', level: 1 };
        case 2:
            return { label: 'Lemah', level: 2 };
        case 3:
            return { label: 'Kuat', level: 3 };
        case 4:
            return { label: 'Sangat Kuat', level: 4 };
    }
});

const passwordRules = computed(() => {
    const password = form.password;
    return {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /[0-9]/.test(password),
        symbol: /[^A-Za-z0-9]/.test(password),
    };
});

const isPasswordStrong = computed(() => {
    return Object.values(passwordRules.value).every(Boolean);
});
</script>

<template>
    <AuthLayout>
        <Head title="Register" />

        <form @submit.prevent="submit" class="max-w-md w-full mx-auto p-6 bg-white shadow-md rounded-lg">
            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                <input
                    id="name"
                    type="text"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />
                <p v-show="form.errors.name" class="text-sm text-red-600 mt-2">
                    {{ form.errors.name }}
                </p>
            </div>

            <!-- Email -->
            <div class="mt-4">
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.email"
                    required
                    maxlength="255"
                    autocomplete="username"
                />
                <p v-show="form.errors.email" class="text-sm text-red-600 mt-2">
                    {{ form.errors.email }}
                </p>
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <label for="phone" class="block font-medium text-sm text-gray-700">Phone</label>
                <input
                    id="phone"
                    type="tel"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.phone"
                    required
                    maxlength="15"
                    autocomplete="tel"
                    @input="form.phone = form.phone.replace(/[^0-9]/g, '')"
                />
                <p v-show="form.errors.phone" class="text-sm text-red-600 mt-2">
                    {{ form.errors.phone }}
                </p>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <div class="relative">
                    <input
                        id="password"
                        :type="showPassword ? 'text' : 'password'"
                        class="mt-1 block w-full pr-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model="form.password"
                        required
                        minlength="8"
                        maxlength="64"
                        autocomplete="new-password"
                    />
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 focus:outline-none"
                    >
                        <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'"></i>
                    </button>
                </div>

                <p v-show="form.errors.password" class="text-sm text-red-600 mt-2">
                    {{ form.errors.password }}
                </p>

                <!-- Password Rules Info -->
                <div v-if="form.password.length > 0" class="mt-3 rounded-lg border bg-gray-50 p-3 text-sm">
                    <p class="mb-2 font-semibold text-gray-700">
                        Password harus memenuhi syarat berikut:
                    </p>
                    <ul class="space-y-1">
                        <li :class="passwordRules.length ? 'text-green-600' : 'text-red-500'">
                            {{ passwordRules.length ? '✓' : '✗' }} Minimal 8 karakter
                        </li>
                        <li :class="passwordRules.uppercase ? 'text-green-600' : 'text-red-500'">
                            {{ passwordRules.uppercase ? '✓' : '✗' }} Memiliki huruf besar (A-Z)
                        </li>
                        <li :class="passwordRules.lowercase ? 'text-green-600' : 'text-red-500'">
                            {{ passwordRules.lowercase ? '✓' : '✗' }} Memiliki huruf kecil (a-z)
                        </li>
                        <li :class="passwordRules.number ? 'text-green-600' : 'text-red-500'">
                            {{ passwordRules.number ? '✓' : '✗' }} Memiliki angka (0-9)
                        </li>
                        <li :class="passwordRules.symbol ? 'text-green-600' : 'text-red-500'">
                            {{ passwordRules.symbol ? '✓' : '✗' }} Memiliki simbol (!@#$%^&*)
                        </li>
                    </ul>
                </div>

                <!-- Password Strength Meter -->
                <div class="mt-3" v-if="form.password.length > 0">
                    <div class="flex gap-1">
                        <div
                            v-for="index in 4"
                            :key="index"
                            class="h-2 flex-1 rounded-full transition-all duration-300"
                            :class="
                                index <= passwordLevel.level
                                    ? {
                                          1: 'bg-red-500',
                                          2: 'bg-orange-500',
                                          3: 'bg-yellow-500',
                                          4: 'bg-green-500'
                                      }[passwordLevel.level]
                                    : 'bg-gray-200'
                            "
                        ></div>
                    </div>
                    <p class="mt-2 text-sm font-medium">
                        Kekuatan password: {{ passwordLevel.label }}
                    </p>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                <input
                    id="password_confirmation"
                    :type="showPassword ? 'text' : 'password'"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />
                <p v-show="form.errors.password_confirmation" class="text-sm text-red-600 mt-2">
                    {{ form.errors.password_confirmation }}
                </p>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Already registered?
                </Link>

                <button
                    type="submit"
                    class="ms-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    :class="{ 'opacity-25 cursor-not-allowed': form.processing || !isPasswordStrong }"
                    :disabled="form.processing || !isPasswordStrong"
                >
                    Register
                </button>
            </div>
        </form>
    </AuthLayout>
</template>
