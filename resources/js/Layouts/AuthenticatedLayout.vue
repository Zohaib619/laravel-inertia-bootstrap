<script setup>
import { onMounted } from 'vue';
import AuthNavbar from '@/Components/Auth/Navbar.vue';
import AuthSidebar from '@/Components/Auth/Sidebar.vue';
import { Link } from '@inertiajs/vue3';
import { initFlowbite } from 'flowbite';

onMounted(() => {
    initFlowbite();
})
</script>

<template>

    <!-- Top Navbar -->
    <AuthNavbar />
    <!-- Top Navbar end -->

    <!-- Sidebar -->
    <AuthSidebar />
    <!-- Sidebar end -->

    <div class="p-4 sm:ml-64">
        <div class="mt-14">
            <slot />
        </div>
    </div>
</template>