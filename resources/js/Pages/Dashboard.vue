<script setup lang="ts">
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head } from '@inertiajs/vue3';

    const props = defineProps<{
        user: any;
    }>();
</script>

<template>
    <Head title="Tableau de bord" />
    
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Vous êtes connecté en tant que <strong>{{ props.user.name }}</strong></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
