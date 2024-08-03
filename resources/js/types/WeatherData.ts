export interface WeatherData {
  japanese_name: string;
  weather: { description: string; icon: string }[];
  main: { temp: number };
  wind: { speed: number };
}