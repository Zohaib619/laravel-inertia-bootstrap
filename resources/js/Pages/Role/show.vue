<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
})

defineProps(["role"])
</script>
<template>
    <div class="d-flex justify-content-between align-items-center ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ role?.name }}
        </h2>
        <Link :href="route('roles.index')" class="btn btn-dark">Back</Link>
    </div>
</template>