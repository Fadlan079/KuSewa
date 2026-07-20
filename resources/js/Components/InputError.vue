<script setup>
defineProps({
    message: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <p v-if="message" class="flex items-center gap-1.5 text-xs text-red-500 font-medium">
        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
        {{ message }}
    </p>
</template>
