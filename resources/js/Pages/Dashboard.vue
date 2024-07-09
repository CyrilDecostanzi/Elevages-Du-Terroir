<script setup lang="ts">
    import AnimalRow from '@/Components/AnimalRow.vue';
    import EditDialog from '@/Components/EditDialog.vue';
    import Filters from '@/Components/Filters.vue';
    import Pagination from '@/Components/Pagination.vue';
    import {Card, CardContent, CardDescription, CardHeader, CardTitle} from '@/Components/ui/card';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Animal } from '@/types';
    import { Head, useForm, usePage } from '@inertiajs/vue3';

    const props = defineProps<{
        animals: {
            data: Animal[];
            links: string[];
            meta: Object | any;
        };
        types: any;
        breeds: any;
        breedsWithoutFilter: any;
    }>();

    const { filters, sortBy, sortOrder, perPage } = usePage().props as any;

    const form = useForm({
        type_id: filters?.type_id || '',
        breed_id: filters?.breed_id || '',
        sortBy: sortBy || 'created_at',
        sortOrder: sortOrder || 'desc',
        perPage: perPage || 9,
    });

    const filterProps = {
        form: form,
        types: props.types,
        breeds: props.breeds,
    };
    
    const applyFilters = (reset?: boolean) => {
        if (reset) {
            form.type_id = '';
            form.breed_id = '';
            form.sortBy = 'created_at';
            form.sortOrder = 'desc';
        }
        form.get(route('dashboard'), {
            preserveScroll: true,
        });
    };
    
</script>

<template>
    <Head title="Tableau de bord" />
    
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Card class="sm:p-6">
                    <CardHeader>
                        <CardTitle class="pb-4">
                            Les animaux enregistrés
                        </CardTitle>
                        <CardDescription>
                            Ici vous pouvez voir la liste des animaux enregistrés, les modifier, les supprimer ou en ajouter de nouveaux ainsi que gérer les status de vente.
                        </CardDescription>
                        <CardDescription class="py-4 font-bold">
                            Résultats : {{ animals.meta.total }}
                        </CardDescription>
                        <Filters :filterProps="filterProps" :applyFilters="applyFilters"/>
                        <EditDialog :types="props.types" :breeds="props.breeds" :applyFilters="applyFilters" :animal="null" />
                    </CardHeader>
                    <CardContent class="sm:p-2 flex flex-col justify-center items-center">
                        <div class="flex flex-col gap-4 w-full">
                            <AnimalRow v-for="animal in animals.data" :key="animal.id" :animal="animal" :types="types" :breeds="breedsWithoutFilter" :applyFilters="applyFilters" />
                        </div>
                    <Pagination :links="animals.links" :meta="animals.meta" />
                    </CardContent>
                </Card>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
