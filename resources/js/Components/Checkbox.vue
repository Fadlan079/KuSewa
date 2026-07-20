<script setup>
defineProps({
    checked: Boolean,
    modelValue: [Boolean, String, Number, Array],
    value: [Boolean, String, Number],
});

defineEmits(['update:checked', 'update:modelValue']);
</script>

<template>
    <input
        type="checkbox"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
        :checked="checked ?? modelValue"
        :value="value"
        @change="$emit('update:checked', $event.target.checked); $emit('update:modelValue', $event.target.checked)"
        v-bind="$attrs"
    />
</template>
