<script setup lang="ts">
    import { Card, CardDescription, CardHeader, CardTitle, CardContent } from '@/Components/ui/card'
    import { Badge } from '@/Components/ui/badge'

    defineProps<{
        animal: any;
    }>();
</script>

<template>
    <Card>
        <CardHeader class="p-0 mb-4">
            <div class="image-container relative rounded-t-lg overflow-hidden h-48">
                <img :src="animal.image" alt="animal.name" class="w-full h-full object-cover" />
                <Badge class="absolute top-4 right-4">Disponible</Badge>
            </div>
        </CardHeader>
        <CardContent class="flex flex-col gap-2">
            <CardTitle>{{ animal.name }} </CardTitle>
            <div class="flex gap-2">
                <span class="first-letter:capitalize">{{ animal.type }}</span> - <span class="first-letter:capitalize">{{ animal.breed }}</span>
            </div>
            <span class="text-gray-600">{{ animal.age }} mois</span>
            <span class="text-gray-600 font-bold">{{ animal.price }} € TTC</span>
            <CardDescription>{{ animal.description }}</CardDescription>
        </CardContent>
       
    </Card>
</template>