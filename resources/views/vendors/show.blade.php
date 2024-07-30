<x-base title="Laravel基礎">
  <h1>{{ $vendor->vendor_name }}の商品一覧</h1>
  
  <section class="text-center grid grid-cols-6 gap-4 content-center">
  @foreach ($columns as $column)
    <div class="py-2 text-white bg-sky-500 font-bold">{{ $column }}</div>
  @endforeach
  {{-- $productsのケース --}}
  @isset($products)
  @foreach ($products as $val)
    @foreach ($columns as $column)
    <div class= "h-full bg-sky-200">{{ $val->$column }}</div>
    @endforeach
  @endforeach  
  @endisset
  {{-- $productのケース --}}
  @isset($product)
  @foreach ($columns as $column)
  <div class="h-full bg-sky-200">{{ $product->$column }}</div>
  @endforeach
  @endisset
  </section>
</x-base>