<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { useForm } from '@inertiajs/vue3';

defineOptions({
    layout: DashboardLayout
});

const props = defineProps({
    roles: {
        type: Array
    },
    user: {
        type: Object
    }
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role_id: props.user.role_id
});
</script>

<template>
    <h1>{{ __("Update User") }}</h1>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="form.put(route('users.update'))">
                <div class="mb-3">
                    <h6>{{ __("Name") }}</h6>
                    <input type="text" class="form-control" v-model="form.name">
                    <p class="text-danger" v-if="form.errors.name">{{ form.errors.name }}</p>
                </div>
                <div class="mb-3">
                    <h6>{{ __("Email") }}</h6>
                    <input type="email" class="form-control" v-model="form.email">
                    <p class="text-danger" v-if="form.errors.email">{{ form.errors.email }}</p>
                </div>
                <div class="mb-3">
                    <h6>{{ __("Password") }}</h6>
                    <input type="password" class="form-control" v-model="form.password">
                    <p class="text-danger" v-if="form.errors.password">{{ form.errors.password }}</p>
                </div>
                <div class="mb-3">
                    <h6>{{ __("Role") }}</h6>
                    <select v-model="form.role_id" class="form-select">
                        <option value="">{{ __("Select Role") }}</option>
                        <option v-for="role in roles" :key="role.id" :value="role.id">
                            {{ role.name }}
                        </option>
                    </select>
                    <p class="text-danger" v-if="form.errors.role_id">{{ form.errors.role_id }}</p>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark" type="submit">{{ __("Create") }}</button>
                </div>
            </form>
        </div>
    </div>
</template>
