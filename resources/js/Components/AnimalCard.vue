<script setup lang="ts">
    import { Card, CardDescription, CardHeader, CardTitle, CardContent } from '@/Components/ui/card'
    import { Badge } from '@/Components/ui/badge'
    import { Animal } from '@/types'

    defineProps<{
        animal: Animal;
    }>();
    
</script>

<template>
    <Card>
        <CardHeader class="p-0 mb-4">
            <div class="image-container relative rounded-t-lg overflow-hidden h-48">
                <img :src="animal.image" alt="animal.name" class="w-full h-full object-cover" />
                <Badge v-if="!animal.is_sold" class="absolute top-4 right-4">Disponible</Badge>
                <Badge v-else class="absolute top-4 right-4 bg-red-500">Vendu</Badge>
            </div>
        </CardHeader>
        <CardContent class="flex flex-col gap-2">
            <CardTitle>{{ animal.name }} </CardTitle>
            <div class="flex gap-2">
                <span class="first-letter:capitalize">{{ animal.type.name }}</span> - <span class="first-letter:capitalize">{{ animal.breed.name }}</span>
            </div>
            <span class="text-gray-600">{{ animal.age }} mois</span>
            <span class="text-gray-600 font-bold">{{ animal.price }} € TTC</span>
            <CardDescription>{{ animal.description }}</CardDescription>

            <!-- <span class="text-gray-400 ">Ajouté le {{ animal.created_at }}</span> -->
        </CardContent>
       
    </Card>
</template>