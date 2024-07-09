<script setup lang="ts">
import {
  Dialog,
  DialogClose,
  DialogFooter,
  DialogScrollContent,
  DialogTitle,
  DialogTrigger,
} from '@/Components/ui/dialog'
import { Button } from './ui/button';
import { useForm } from '@inertiajs/vue3';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import InputError from '@/Components/InputError.vue';
import { ref } from 'vue';
import { toast } from 'vue-sonner';
import DialogDescription from './ui/dialog/DialogDescription.vue';



const props = defineProps<{
  animal?: any;
  types: any;
  breeds: any;
  applyFilters: () => void;
}>();

const open = ref(false);

const form = useForm({
  name: props.animal?.name || '',
  price: props.animal?.price || '',
  age: props.animal?.age || '',
  description: props.animal?.description || '',
  image: props.animal?.image || '/assets/placeholder.svg',
  image_upload: null,
  type_id: props.animal?.type.id || '',
  breed_id: props.animal?.breed.id || '',
});

let filteredBreeds = props.breeds.filter((breed: any) => breed.type_id == form.type_id);

const submitForm = () => {
  if(!props.animal) {
    form.post(route('animals.store'), {
      preserveScroll: true,
      onSuccess: () => {
        open.value = false;
        toast.success('Animal ajouté avec succès');
        props.applyFilters();
      },
    });
    console.log(form.errors.image_upload)
    return;
  }

  form.post(route('animals.update', {
    id: props.animal?.id,
  }), {
    preserveScroll: true,
    onSuccess: () => {
      open.value = false;
      toast.success('Animal modifié avec succès');
    },
  });
}

const toggleDialog = () => {
  open.value = !open.value;
}

const handleImageChange = (e: any) => {
  const file = e.target.files[0];
  const reader = new FileReader();

  reader.onload = (e) => {
    form.image = e.target?.result;
    form.image_upload = file;
  }
  reader.readAsDataURL(file);
}

const handleTypeChange = () => {
  form.breed_id = '';
  filteredBreeds = props.breeds.filter((breed: any) => breed.type_id == form.type_id);
}

const displayedTexts = {
  button: props.animal ? 'Modifier' : 'Ajouter un animal',
  title: props.animal ? 'Modifier l\'animal' : 'Ajouter un animal',
  description: props.animal ? 'Remplissez le formulaire ci-dessous pour modifier l\'animal' : 'Utilisez le formulaire ci-dessous pour ajouter un animal',
}
</script>

<template>
  <Dialog :open="open">
    <DialogTrigger asChild @click="toggleDialog">
      <Button :variant="props.animal ? 'outline' : 'default'">{{ displayedTexts.button }}</Button>
    </DialogTrigger>
    <DialogScrollContent class="w-full max-w-3xl">
      <DialogTitle>{{ displayedTexts.title }}</DialogTitle>
      <DialogDescription>
        {{ displayedTexts.description }}
      </DialogDescription>
       <form @submit.prevent="submitForm" class="mt-6 space-y-3">
        <InputError class="mt-2" :message="form.errors.image_upload" />
          <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <div class="image-container relative rounded-lg overflow-hidden h-64 w-full sm:h-72 sm:w-72">
              <img :src="form.image" alt="animal.name" class="w-full h-full object-cover object-center" />"
              <!-- UPLOAD IMAGE -->
              <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <label for="image" class="cursor-pointer text-white">
                  <input
                  id="image"
                  type="file"
                  class="hidden"
                  @change="handleImageChange"
                  />
                  <span>Changer l'image</span>
                </label>
              </div>
            </div>
            <div class="flex gap-4 w-full flex-1">
              <div class="flex flex-col gap-2 w-full">
                <Label for="type">Type</Label>
                <select v-model="form.type_id" class="input px-4 rounded-lg h-10" @change="handleTypeChange">
                  <option value="">Selectionner un type</option>
                  <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
                </select>
                <InputError :message="form.errors.type_id" />
                <Label v-if="form.type_id" for="breed">Race</Label>
                <select v-if="form.type_id" v-model="form.breed_id" class="input px-4 rounded-lg h-10"> 
                  <option value="">Selectionner une race</option>
                  <option v-for="breed in filteredBreeds" :key="breed.id" :value="breed.id">{{ breed.name }}</option>
                </select>
                <InputError v-if="form.type_id" class="mt-2" :message="form.errors.breed_id" />
                <div>
                    <Label for="name">Nom</Label>
                    <Input 
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="flex gap-4">
                  <div>
                      <Label for="price">Prix TTC en €</Label>
                      <Input 
                          id="price"
                          type="number"
                          class="mt-1 block w-full"
                          v-model="form.price"
                          required
                          autocomplete="price"
                      />
                      <InputError class="mt-2" :message="form.errors.price" />
                  </div>
                  <div>
                      <Label for="age">Age</Label>
                      <Input 
                          id="age"
                          type="number"
                          class="mt-1 block w-full"
                          v-model="form.age"
                          required
                          autocomplete="age"
                      />
                      <InputError class="mt-2" :message="form.errors.age" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
              <Label for="description">Description</Label>
              <Input 
                  id="description"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.description"
                  required
                  autocomplete="description"
              />
              <InputError class="mt-2" :message="form.errors.description" />
          </div>
        
          <DialogFooter class="sm:justify-end flex gap-4">
            <DialogClose as-child @click="toggleDialog">
              <Button type="button" variant="secondary">
                Annuler
              </Button>
            </DialogClose>
            <Button type="submit">Sauvegarder</Button>
          </DialogFooter>
        </form>
    </DialogScrollContent>
  </Dialog>
</template>
