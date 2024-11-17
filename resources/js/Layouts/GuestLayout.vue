<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <Link href="/">
                            <ApplicationLogo />
                        </Link>
                    </div>
            
                    <div
                        class="card-body">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
