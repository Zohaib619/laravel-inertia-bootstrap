<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineOptions({
    layout: AuthenticatedLayout
})
defineProps({
    user: {
        type: Number
    }
})
</script>

<template>
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __("Welcome :name", {name: $page.props.auth.user.name}) }}
    </h2>
    <div class="grid grid-cols-5 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
            <p class=" text-gray-400 dark:text-gray-500">
                Total User {{ user }}
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
    </div>
</template>
