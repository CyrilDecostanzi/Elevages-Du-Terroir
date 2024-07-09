<script setup lang="ts">
    import { Card, CardDescription, CardHeader, CardTitle } from '@/Components/ui/card'
    import EditDialog from '@/Components/EditDialog.vue'
    import { Badge } from '@/Components/ui/badge'
    import { Animal } from '@/types'
    import { Button } from './ui/button';
    import { useForm } from '@inertiajs/vue3';
    import { toast } from 'vue-sonner';


    const props = defineProps<{
        animal: Animal;
        types: any;
        breeds: any;
        applyFilters: () => void;
    }>();

    const form = useForm({
        is_sold: props.animal.is_sold,
    });


    const switchSold = () => {
        form.post(route('animals.switch-sold-status', { id: props.animal.id }), {
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Status de vente modifié avec succès');
            }
        });
    }

    const deleteAnimal = () => {
        form.delete(route('animals.destroy', { id: props.animal.id }), {
            preserveScroll: true,
            onSuccess: () => {
                toast.success('La fiche de ' + props.animal.name + ' a été supprimée avec succès');
            }
        });
    }
    
</script>

<template>
    <Card class="w-full relative">
        <CardHeader class="flex sm:flex-row gap-4">
            <div class="image-container relative rounded-lg overflow-hidden sm:h-36 sm:w-64">
                <img :src="animal.image" alt="animal.name" class="w-full h-full object-cover" />
                <Badge v-if="!animal.is_sold" class="absolute top-2 right-2">Disponible</Badge>
                <Badge v-else variant="destructive" class="absolute top-2 right-2">Vendu</Badge>
            </div>
            <div class="flex flex-col gap-2 w-full">
                <CardTitle>{{ animal.name }}</CardTitle>
                <CardDescription>{{ animal.type.name }} - {{ animal.breed.name }}</CardDescription>
                <CardDescription>{{ animal.age }} ans</CardDescription>
                <CardDescription>{{ animal.price }} €</CardDescription>
                <CardDescription>{{ animal.description }}</CardDescription>
                <CardDescription>Ajouté le {{ animal.created_at }}</CardDescription>
            </div>
            <div class="flex flex-col gap-2">
                <EditDialog :animal="animal" :types="types" :breeds="breeds" :applyFilters="applyFilters" />
                <Button variant="destructive" @click="deleteAnimal">Supprimer</Button>
                <Button variant="outline"
                        @click="switchSold"
                >{{ animal.is_sold ? 'Marquer comme disponible' : 'Marquer comme vendu' }}</Button>
            </div>
        </CardHeader>
    </Card>
</template>