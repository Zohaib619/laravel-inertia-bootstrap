<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: 'lg', // Default to a size Bootstrap uses (lg)
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.classList.add('modal-open'); // Prevent scroll (Bootstrap style)
        } else {
            document.body.classList.remove('modal-open');
        }
    },
);

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape' && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.classList.remove('modal-open');
});

const maxWidthClass = computed(() => {
    // Map to Bootstrap modal sizes
    return {
        sm: 'modal-sm',
        md: '',
        lg: 'modal-lg',
        xl: 'modal-xl',
    }[props.maxWidth] || 'modal-lg'; // Default to `lg` if no match
});
</script>

<template>
    <Teleport to="body">
        <div v-if="show" class="modal fade show d-block" tabindex="-1" role="dialog" @click.self="close">
            <div class="modal-dialog" :class="maxWidthClass" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <slot />
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Backdrop -->
        <div v-if="show" class="modal-backdrop fade show"></div>
    </Teleport>
</template>
