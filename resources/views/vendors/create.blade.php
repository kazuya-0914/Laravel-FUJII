<x-base title="仕入先登録">
  @if ($errors->any())
  <section class="p-4 mb-4 border border-red-500">
    <ul class="text-red-500 list-none">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </section>
  @endif

  <form action="{{ route('vendors.store') }}" method="post">
    @csrf
    <section class="p-4 grid grid-cols-2 gap-4 border border-lime-700">
      <label>仕入先コード</label>
      <input type="number" name="vendor_code" class="border rounded w-full py-2 px-3">
      <label>仕入先名</label>
      <input type="text" name="vendor_name" class="border rounded w-full py-2 px-3">
    </section>
    <div class="p-4 text-center">
      <button type="submit" class="px-4 py-2 mr-2 text-white bg-purple-500 rounded-lg">登録</button>
    </div>
  </form>
      
</x-base>