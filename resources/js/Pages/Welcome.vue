<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button'
import { Card, CardDescription, CardFooter, CardHeader, CardTitle, CardContent } from '@/Components/ui/card'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps<{
    canLogin?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();


</script>

<template>
    <Head title="Accueil" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex justify-center">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
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
            <Card>
                <CardHeader>
                    <CardTitle>Card Title</CardTitle>
                    <CardDescription>Card Description</CardDescription>
                </CardHeader>
                <CardContent>
                    Card Content
                </CardContent>
                <CardFooter>
                    Card Footer
                </CardFooter>
            </Card>
        </div>
    </div>
</template>
