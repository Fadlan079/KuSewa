<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

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
    <AuthLayout>
        <Head title="Log in" />

        <div
            v-if="status"
            class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <!-- Email -->
            <div>
                <label
                    for="email"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Email
                </label>

                <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-[#466080] focus:ring-2 focus:ring-[#466080]/20"
                />

                <p
                    v-if="form.errors.email"
                    class="mt-2 text-sm text-red-600"
                >
                    {{ form.errors.email }}
                </p>
            </div>

            <!-- Password -->
            <div>
                <label
                    for="password"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    Password
                </label>

                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                    autocomplete="current-password"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 outline-none transition focus:border-[#466080] focus:ring-2 focus:ring-[#466080]/20"
                />

                <p
                    v-if="form.errors.password"
                    class="mt-2 text-sm text-red-600"
                >
                    {{ form.errors.password }}
                </p>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input
                    id="remember"
                    v-model="form.remember"
                    type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-[#466080] focus:ring-[#466080]"
                />

                <label
                    for="remember"
                    class="ml-2 text-sm text-gray-600"
                >
                    Remember me
                </label>
            </div>

            <!-- Action -->
            <div class="flex items-center justify-between">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-sm text-[#466080] hover:underline"
                >
                    Forgot your password?
                </Link>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-lg bg-[#466080] px-5 py-2.5 text-white font-medium transition hover:bg-[#36506d] disabled:cursor-not-allowed disabled:opacity-50"
                >
                    Log in
                </button>
            </div>
        </form>
    </AuthLayout>
</template>
