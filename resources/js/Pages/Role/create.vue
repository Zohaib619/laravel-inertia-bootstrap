<script setup>
import InputError from '@/Components/InputError.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
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
    <div class="d-flex justify-content-between  align-items-center">
        <h2>
            Create Role
        </h2>
        <Link :href="route('roles.index')" class="btn btn-dark">Back</Link>
    </div>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="form.post(route('roles.store'))">
                    <div class="mb-3">
                        <h6>Name</h6>
                        <input type="text" id="name" v-model="form.name"
                            class="form-control"
                            placeholder="Type here..." />
                        <InputError :message="form.errors.name" />
                    </div>
                    <div>
                        <h6>Permission</h6>
                            <div class="flex items-center mb-4" v-for="permission in permissions" :key="permission.id">
                                <input :id="`checkbox-${permission.name}`" type="checkbox" :value="permission.id" v-model="form.permissions" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label :for="`checkbox-${permission.name}`" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ permission.name }}</label>
                            </div>
                        <InputError :message="form.errors.permissions" />
                    </div>
                <button type="submit"
                    class="btn btn-dark">Create</button>
            </form>
        </div>
    </div>
</template>