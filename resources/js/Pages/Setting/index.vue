<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    setting: {
        type: Object
    }
});
defineOptions({
    layout: DashboardLayout
})
const form = useForm({
    title: props.setting.title,
    description: props.setting.description
});
</script>
<template>
    <h1>Setting</h1>
    <div class="card">
        <div class="card-body">
            {{ form }}
            <form @submit.prevent="form.put(route('setting.update'))">
                <div class="mb-3">
                    <h6>Title</h6>
                    <input type="text" v-model="form.title" class="form-control">
                    <p v-if="form.errors?.title" class="text-danger">{{ form.errors?.title }}</p>
                </div>
                <div class="mb-3">
                    <h6>Description</h6>
                    <textarea class="form-control" v-model="form.description" id=""></textarea>
                    <p v-if="form.errors?.description" class="text-danger">{{ form.errors?.description }}</p>
                </div>
                <div class="mb-3">
                    <button class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
</template>