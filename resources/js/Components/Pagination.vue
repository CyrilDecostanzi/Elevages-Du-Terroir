<script setup lang="ts">
  import { Link } from '@inertiajs/vue3';
  import { defineProps } from 'vue';

  const props = defineProps<{
    links: any;
    meta: any;
  }>();
</script>

<template>
  <nav class="flex justify-between items-center mt-4 sm:w-[60%] gap-2 px-8 py-6">
    <div class="flex flex-row gap-2">
    <Link :href="links.first || ''" class="text-gray-500 bg-primary rounded-full p-2 w-8 h-8 flex justify-center items-center" :disabled="!links.first">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M11 19l-7-7 7-7m8 14l-7-7 7-7"
        />
      </svg>
    </Link>
    <Link :href="links.prev || ''" class="text-gray-500 bg-primary rounded-full p-2 w-8 h-8 flex justify-center items-center" :disabled="!links.prev">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15 19l-7-7 7-7"
        />
      </svg>
    </Link>
  </div>
  <!-- TODO: Add the links and limit the number of links to show -->
  <!-- <div class="flex flex-row gap-2">
    <Link v-for="link in filteredLinks" :key="link.label" :href="link.url" 
        :class="['text-gray-500 bg-primary rounded-full p-2 w-8 h-8 flex justify-center items-center', { 'bg-secondary': link.active }]" 
        :disabled="!link.url">
        {{ link.label }}
      </Link>
  </div> -->
    <span
      class="text-gray-500 bg-secondary flex min-w-16 justify-center items-center p-2 rounded-xl mx-8 font-bold"
    >{{ meta.current_page }} / {{ meta.last_page }}</span>

    
    <div class="flex flex-row gap-2">
    <Link :href="links.next || ''" class="text-gray-500 bg-primary rounded-full p-2 w-8 h-8 flex justify-center items-center" :disabled="!links.next">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5l7 7-7 7"
        />
      </svg>
    </Link>

    <Link :href="links.last || ''" class="text-gray-500 bg-primary rounded-full p-2 w-8 h-8 flex justify-center items-center" :disabled="!links.last">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M13 5l7 7-7 7M5 5l7 7-7 7"
        />
      </svg>
    </Link>
  </div>
  </nav>
</template>