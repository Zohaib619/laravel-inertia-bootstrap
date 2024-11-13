<script setup>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
defineOptions({ layout: WebsiteLayout })

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <h1>home</h1>
</template>
