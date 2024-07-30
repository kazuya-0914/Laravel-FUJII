<script setup lang="ts">
import BaseLayout from '@/Components/BaseLayout.vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
</script>

<template>
  <BaseLayout :weatherData="props.weatherData">
    <p class="font-bold underline">Laravel基礎へようこそ</p>
    <p>これはVue.jsファイルです</p>
  </BaseLayout>
</template>