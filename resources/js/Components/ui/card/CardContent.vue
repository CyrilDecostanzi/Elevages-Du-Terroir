<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/Lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
}>()
</script>

<template>
  <div :class="cn('p-4 sm:p-6 pt-0', props.class)">
    <slot />
  </div>
</template>
