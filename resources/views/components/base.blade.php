<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <!-- Scripts -->
  @vite('resources/css/app.css')
</head>
<body>
  <div class="container w-3/4 m-auto">
    <header class="p-4">
      <div class="text-2xl">{{ $title }}</div>
    </header>

    <main>
      <section class="p-4 mb-4 border border-indigo-700">
      {{ $slot }}
      </section>
    </main>

    <footer class="p-4 text-center">
      <div class="mb-4">
        <a href="{{ route('top') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">Top</a>
        <a href="{{ route('hello') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">Hello</a>
        <a href="{{ route('products') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">Products</a>
        <a href="{{ route('vendors') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">Vendors</a>
        <a href="{{ route('requests') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">Requests</a>
      </div>
      <div>
        <a href="{{ route('vendors.create') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">仕入先登録</a>
        <a href="{{ route('products.create') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">商品登録</a>
        <a href="{{ route('sign-in') }}" class="px-4 py-2 text-white bg-indigo-500 rounded-lg">サインイン</a>
      </div>
    </footer>
  </div>
</body>
</html>