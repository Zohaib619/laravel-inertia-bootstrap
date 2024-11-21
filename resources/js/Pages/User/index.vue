<script setup>
import Breadcrumb from '@/Components/Dashboard/Breadcrumb.vue';
import Heading from '@/Components/Dashboard/Heading.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
})

defineProps({
    users: {
        type: Array
    }
})
</script>
<template>
    <div class="d-flex justify-content-between align-items-center">
        <Heading>User</Heading>
        <Link class="btn btn-dark" :href="route('users.create')">{{ __("Create User") }}</Link>
    </div>

    <div class="table-responsive rounded overflow-hidden">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <th scope="row">
                        {{ user.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ user.email }}
                    </td>
                    <td class="px-6 py-4 ">
                        <a href="#" class="font-medium me-1 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="font-medium ms-1 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>