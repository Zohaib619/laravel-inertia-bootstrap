<script setup>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
defineOptions({ layout: WebsiteLayout })
</script>

<template>
    <h1>{{ __("home") }}</h1>
    <p>{{ __("this is some page", {name: "Dynamic Localization"}) }}</p>
</template>
