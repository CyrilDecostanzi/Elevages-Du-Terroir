<script setup lang="ts">
import { defineProps } from 'vue';
import { Button } from '@/Components/ui/button';

const props = defineProps<{
    filterProps: any;
    applyFilters: (reset?: boolean) => void;
}>();

const { form, types, breeds } = props.filterProps;


</script>

<template>
    <div class="md:flex mb-4 gap-4 w-full">
        <form @change="applyFilters()" class="flex gap-4 flex-wrap">
            <select v-model="form.type_id" class="input px-4 rounded-lg h-10" @change="form.breed_id = ''">
                <option value="">Sélectionner un type</option>
                <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
            </select>
            <select v-if="form.type_id" v-model="form.breed_id" class="input px-4 rounded-lg h-10">
                <option value="">Sélectionner une race</option>
                <option v-for="breed in breeds" :key="breed.id" :value="breed.id">{{ breed.name }}</option>
            </select>
            <select v-model="form.sortBy" class="input px-4 rounded-lg h-10">
                <option value="">Trier par</option>
                <option value="created_at">Date d'ajout</option>
                <option value="name">Nom</option>
                <option value="age">Age</option>
                <option value="price">Prix</option>
            </select>
            <select v-model="form.sortOrder" class="input px-4 rounded-lg h-10">
                <option value="desc">Descendant</option>
                <option value="asc">Ascendant</option>
            </select>
            <Button variant="outline" type="button" @click="(e) => applyFilters(true)">
                Effacer les filtres
            </Button>
        </form>
    </div>
</template>