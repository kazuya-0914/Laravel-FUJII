<template>
  <div class="weather-card">
    <article v-for="(weather, city) in weatherData" :key="city" class="p-4">
      <h3>{{ weather.japanese_name }}の天気</h3>
      <section class="p-4 weather-data">
        <div>天気</div><div> {{ weather.weather[0].description || 'N/A' }}</div>
        <div>アイコン</div><div><img :src="`https://openweathermap.org/img/wn/${weather.weather[0].icon || 'N/A' }@2x.png`"></div>
        <div>温度</div><div>{{ weather.main.temp ?? 'N/A'}} °C</div>
        <div>風速</div><div>{{ weather.wind.speed ?? 'N/A' }} (m/s)</div>
      </section>
    </article>
  </div>
</template>

<script>

export default {
  props: {
    weatherData: Object
  }
}

</script>

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