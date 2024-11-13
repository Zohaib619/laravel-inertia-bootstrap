<script setup>
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AuthenticatedLayout
})

const form = useForm({
    name: ""
})
</script>
<template>
    <div class="flex justify-between ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Permission
        </h2>
        <Link :href="route('permissions.index')"
            class="p-2 text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 rounded">Back</Link>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3 mt-3">

        <form @submit.prevent="form.post(route('permissions.store'))">
            <div class="grid gap-6 mb-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" v-model="form.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Type here..." />
                    <InputError :message="form.errors.name" />
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
        </form>

    </div>
</template>