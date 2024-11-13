<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout
})

defineProps(["role"])
</script>
<template>
    <div class="flex justify-between ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ role?.name }}
        </h2>
        <Link :href="route('roles.index')" class="p-2 text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 rounded">Back</Link>
    </div>
</template>