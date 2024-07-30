<x-base title="商品登録">
  @if ($errors->any())
  <section class="p-4 mb-4 border border-red-500">
    <ul class="text-red-500 list-none">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </section>
  @endif

  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <section class="p-4 grid grid-cols-2 gap-4 border border-lime-700">
      <label>商品名</label>
      <input type="text" name="product_name" class="border rounded w-full py-2 px-3">
      <label>価格</label>
      <input type="number" name="price" class="border rounded w-full py-2 px-3">
      <label>仕入先コード</label>
      <select name="vendor_code">
        <option value="" selected>選択してください</option>
        @foreach ($vendor_codes as $vendor_code)
        <option value="{{ $vendor_code }}">{{ $vendor_code }}</option>
        @endforeach
      </select>
      <!-- <label>画像</label> -->
      <!-- <input type="file" name="image"> -->
    </section>
    <div class="p-4 text-center">
      <button type="submit" class="px-4 py-2 mr-2 text-white bg-purple-500 rounded-lg">登録</button>
    </div>
  </form>
      
</x-base>