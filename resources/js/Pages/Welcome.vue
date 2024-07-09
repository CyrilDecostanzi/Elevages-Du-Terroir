<script setup lang="ts">
    import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
    import { Button } from '@/Components/ui/button'
    import { Card, CardDescription, CardHeader, CardTitle, CardContent } from '@/Components/ui/card'
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import AnimalCard from '@/Components/AnimalCard.vue';
    import { Animal } from '@/types';
    import Pagination from '@/Components/Pagination.vue';
    import Filters from '@/Components/Filters.vue';

    
    const props = defineProps<{
        canLogin?: boolean;
        animals: {
            data: Animal[];
            links: string[];
            meta: Object;
        };
        types: any;
        breeds: any;
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
        form.get(route('animals.index'), {
            preserveScroll: true,
        });
    };
    
</script>

<template>
    <Head title="Accueil" />
    <div class=" text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex justify-center bg-[url('assets/bg6.jpg')] bg-cover bg-fixed">
        <div class="relative w-full px-4 max-w-[1300px]">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:justify-center lg:col-start-2">
                   <ApplicationLogo class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]"/>
                </div>
                <nav v-if="canLogin" class="flex flex-1 justify-end">
                    <Button asChild v-if="$page.props.auth.user" variant="outline">
                        <Link :href="route('dashboard')">
                            Tableau de bord
                        </Link>
                    </Button>

                    <template v-else>
                        <Button asChild variant="outline">
                            <Link :href="route('login')">
                                Connexion
                            </Link>
                        </Button>
                    </template>
                </nav>
            </header>
            <Card class="mb-12">
                <CardHeader class="p-10 justify-center items-center">
                    <CardTitle class="text-3xl mb-4">Bienvenue à la ferme !</CardTitle>
                    <CardDescription>Retrouvez ici tous les animaux en vente à la ferme. Pour tout achat ou renseignement, n'hésitez pas à nous contacter.</CardDescription>
                    <CardDescription class="font-bold">LES ACHATS SE FONT UNIQUEMENT SUR PLACE, CONTACTEZ-NOUS POUR PLUS D'INFORMATIONS.</CardDescription>
                    <p class="font-bold mt-4 text-3xl">01 23 45 67 89</p>
                </CardHeader>
                <CardContent class="flex flex-col justify-center items-center">
                    <Filters :filterProps="filterProps" :applyFilters="applyFilters"/>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
                        <AnimalCard v-for="animal in animals.data" :key="animal.name" :animal="animal" />
                    </div>
                    <Pagination :links="animals.links" :meta="animals.meta" />
                </CardContent>
            </Card>
        </div>
    </div>
</template>
