<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
})

defineProps(["roles"])
</script>
<template>
    <div class="flex justify-between ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Roles
        </h2>
        <Link :href="route('roles.create')"
            class="p-2 text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 rounded">Create Role</Link>
    </div>

    <div class="table-responsive rounded overflow-hidden">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="role in roles" :key="role.id">
                    <td>{{ role.id }}</td>
                    <td>{{ role.name }}</td>
                    <td class="px-6 py-4 ">
                        <Link :href="route('roles.edit', role.id)" class="btn btn-secondary">Edit</Link>
                        <Link :href="route('roles.show', role.id)" class="btn btn-primary mx-2">Show</Link>
                        <Link :href="route('roles.destroy', role.id)" method="DELETE" as="button"
                            class="btn btn-danger">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>