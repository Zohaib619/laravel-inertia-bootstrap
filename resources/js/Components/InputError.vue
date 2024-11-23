<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="mt-2 text-danger small">
            {{ message }}
        </p>
    </div>
</template>
