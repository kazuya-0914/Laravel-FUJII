<script setup lang="ts">
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const title: string = 'Laravel基礎';

interface WeatherData {
  japanese_name: string;
  weather: { description: string; icon: string }[];
  main: { temp: number };
  wind: { speed: number };
}

interface WeatherProps {
  [key: string]: WeatherData;
}

const props = defineProps<{ weatherData: WeatherProps }>();
</script>

<template>
  <div class="container w-5/6 m-auto">
    <header class="p-4">
      <div class="text-2xl">{{ title }}</div>
    </header>

    <main>
      <article class="p-4 mb-4 border border-indigo-700">
        <slot />
      </article>

      <div class="weather-card">
        <article
          v-for="(weather, city) in weatherData"
          :key="city"
          class="p-4"
        >
          <h3>{{ weather.japanese_name }}の天気</h3>
          <section class="p-4 weather-data">
            <div>天気</div>
            <div>{{ weather.weather[0].description || 'N/A' }}</div>
            <div>アイコン</div>
            <div>
              <img
                :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon || 'N/A'}@2x.png`"
              />
            </div>
            <div>温度</div>
            <div>{{ weather.main.temp ?? 'N/A' }} °C</div>
            <div>風速</div>
            <div>{{ weather.wind.speed ?? 'N/A' }} (m/s)</div>
          </section>
        </article>
      </div>
    </main>

    <footer class="p-4 text-center">
      <div class="mb-4">
        <Link :href="route('top')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">Top</Link>
        <Link :href="route('hello')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">Hello</Link>
        <Link :href="route('products')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">Products</Link>
        <Link :href="route('vendors')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">Vendors</Link>
        <Link :href="route('requests')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">Requests</Link>
      </div>
      <div>
        <Link :href="route('vendors.create')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">仕入先登録</Link>
        <Link :href="route('products.create')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">商品登録</Link>
        <Link :href="route('sign-in')" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">サインイン</Link>
      </div>
    </footer>
  </div>
</template>

<style scoped>
.weather-card {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.5rem;
}
article {
  border: solid 1px green;
}
h3 {
  font-size: 1.5rem;
  font-weight: bold;
}
.weather-data {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 0.5rem;
  border: solid 1px lime
}
</style>