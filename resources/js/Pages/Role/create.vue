<script setup>
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout
})
defineProps({
    permissions: {
        type: Array,
    }
});
const form = useForm({
    name: "",
    permissions: []
})
</script>
<template>
    <div class="flex justify-between ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Role
        </h2>
        <Link :href="route('roles.index')"
            class="p-2 text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 rounded">Back</Link>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3 mt-3">
        <form @submit.prevent="form.post(route('roles.store'))">
            <div class="grid gap-6 mb-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" v-model="form.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Type here..." />
                    <InputError :message="form.errors.name" />
                </div>
                <div>
                    <label for="permissions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions</label>
                        <div class="flex items-center mb-4" v-for="permission in permissions" :key="permission.id">
                            <input :id="`checkbox-${permission.name}`" type="checkbox" :value="permission.id" v-model="form.permissions" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label :for="`checkbox-${permission.name}`" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ permission.name }}</label>
                        </div>
                    <InputError :message="form.errors.permissions" />
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
        </form>
    </div>
</template>