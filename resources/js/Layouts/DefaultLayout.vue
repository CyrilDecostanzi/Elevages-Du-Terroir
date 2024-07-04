<script setup lang="ts">
import { Toaster } from '@/Components/ui/sonner';
</script>

<template>
    <Toaster />
    <slot />
    <div class="footer">
        <!-- <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
            
        </div> -->
    </div>
</template>
