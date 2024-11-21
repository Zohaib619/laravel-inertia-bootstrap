<script setup>
import InputError from '@/Components/InputError.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
})
const props = defineProps({
    role: {
        type: Object,
        required: true
    },
    permissions: {
        type: Array,
        required: true
    }
})
const form = useForm({
    name: props.role.name,
    permissions: props.role.permissions.map(permission => permission.id)
})
</script>
<template>
    <div class="flex justify-between ">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Role
        </h2>
        <Link :href="route('roles.index')"
            class="p-2 text-sm text-white font-semibold bg-blue-600 hover:bg-blue-800 rounded">Back</Link>
    </div>


    <div class="card">
        <div class="card-body">
            <form @submit.prevent="form.put(route('roles.update', role.id))">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" v-model="form.name"
                            class="form-control"
                            placeholder="Type here..." />
                        <InputError :message="form.errors.name" />
                    </div>
                <div>
                    <label for="permissions"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions</label>
                    <div class="flex items-center mb-4" v-for="permission in permissions" :key="permission.id">
                        <input :id="`checkbox-${permission.name}`" type="checkbox" :value="permission.id"
                            v-model="form.permissions"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label :for="`checkbox-${permission.name}`"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ permission.name }}</label>
                    </div>
                    <InputError :message="form.errors.permissions" />
                </div>
                <button type="submit"
                    class="btn btn-dark">Update</button>
            </form>
        </div>
    </div>
</template>