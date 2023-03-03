<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-quint-green border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-800 focus:bg-emerald-800 active:bg-quint-green focus:outline-none focus:ring-2 focus:ring-quint-green focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
