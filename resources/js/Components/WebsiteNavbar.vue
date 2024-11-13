<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;
</script>

<template>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('home')">{{ __('Home') }}</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('about')">{{ __('About') }}</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('blogs')">{{ __('Blogs') }}</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('contact')">{{ __('Contact') }}</Link>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('register')">{{ __("Register") }}</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('login')">{{ __("Login") }}</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
