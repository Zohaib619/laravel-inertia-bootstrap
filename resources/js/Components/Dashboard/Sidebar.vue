<script setup>
import { Link } from '@inertiajs/vue3'; 
import { usePermission } from '@/Composables/permission';
const {hasPermission} = usePermission();
</script>
<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <Link class="nav-link" :href="route('dashboard')">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </Link>
                    <!-- user management -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUserManagement"
                        aria-expanded="false" aria-controls="collapseUserManagement">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        User Management
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUserManagement" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <Link v-if="hasPermission('list-user')" class="nav-link" :href="route('users.index')">Users</Link>
                            <Link class="nav-link" :href="route('roles.index')">Role</Link>
                        </nav>
                    </div>
                    <!-- user management end -->

                    <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->


                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        {{ __("Profile") }}
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
</template>