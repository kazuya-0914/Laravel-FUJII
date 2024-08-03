<script setup lang="ts">
import { defineProps } from 'vue';
import { usePage } from '@inertiajs/vue3';
import BaseLayout from '@/Components/BaseLayout.vue';
import dayjs from 'dayjs';

interface Props {
  columns: string[];
  products?: Record<string, any>[];
  product?: Record<string, any>;
}

const formatDate = (date: string) => {
  return dayjs(date).format('YYYY-MM-DD HH:mm:ss');
};

const props2 = defineProps<Props>();
const { props } = usePage();

</script>

<template>
  <BaseLayout :weatherData="props.weatherData">
    <section class="text-center grid grid-cols-6 gap-4 content-center">
      <!-- カラム名の表示 -->
      <div v-for="column in columns" :key="column" class="py-2 text-white bg-sky-500 font-bold">
        {{ column }}
      </div>

      <!-- $products のケース -->
      <template v-if="products">
        <template v-for="(product, index) in products" :key="index">
          <div v-for="column in columns" :key="column" class="h-full bg-sky-200">
            <template v-if="column === 'image_name' && product[column]">
              <a href="#modal" class="block w-fit">
                <img :src="`/storage/products/${product[column]}`" alt="Product Image">
              </a>
              <div id="modal" class="hidden target:block">
                <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
                  <a href="#" class="block w-full h-full cursor-default"></a>
                  <div class="w-3/4 mx-auto mt-20 relative -top-full">
                    <img :src="`/storage/products/${product[column]}`" alt="Product Image">
                  </div>
                </div>
              </div>
            </template>
            <template v-else-if="column === 'created_at' || column === 'updated_at'">
              {{ formatDate(product[column]) }}
            </template>
            <template v-else>
              {{ product[column] }}
            </template>
          </div>
        </template>
      </template>

      <!-- $products のケース -->
      <template v-if="product">
        <div v-for="column in columns" :key="column" class="h-full bg-sky-200">
          <template v-if="column === 'image_name' && product[column]">
            <a href="#modal" class="block w-fit">
              <img :src="`/storage/products/${product[column]}`" alt="Product Image">
            </a>
            <div id="modal" class="hidden target:block">
              <div class="block w-full h-full bg-black/70 absolute top-0 left-0">
                <a href="#" class="block w-full h-full cursor-default"></a>
                <div class="w-3/4 mx-auto mt-20 relative -top-full">
                  <img :src="`/storage/products/${product[column]}`" alt="Product Image">
                </div>
              </div>
            </div>
          </template>
          <template v-else-if="column === 'created_at' || column === 'updated_at'">
            {{ formatDate(product[column]) }}
          </template>
          <template v-else>
            {{ product[column] }}
          </template>
        </div>
      </template>
    </section>
  </BaseLayout>
</template>