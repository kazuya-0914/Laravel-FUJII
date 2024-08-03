<x-base title="Laravel基礎">
  <section class="text-center grid grid-cols-6 gap-4 content-center">
  @foreach ($columns as $column)
    <div class="py-2 text-white bg-sky-500 font-bold">{{ $column }}</div>
  @endforeach
  {{-- $productsのケース --}}
  @isset($products)
  @foreach ($products as $val)
    <x-product :columns="$columns" :product="$val" />
  @endforeach  
  @endisset
  {{-- $productのケース --}}
  @isset($product)
  <x-product :columns="$columns" :product="$product" />
  @endisset
  </section>
</x-base>