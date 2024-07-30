<x-base title="Laravel基礎">
  <h2 class="text-2xl mb-6">フォームの入力内容</h2>
  <section class="p-4  mb-6 grid grid-cols-2 gap-4 border border-indigo-700">
    <div>お名前</div><div>{{ $user_name }}</div>
    <div>メールアドレス</div><div>{{ $user_email }}</div>
    <div>性別</div><div>{{ $user_gender }}</div>
    <div>お問い合わせ種別</div><div>{{ $category }}</div>
    <div>お問い合わせ内容</div>
    <div>{{ $message }}</div>
  </section>

  <h2 class="text-2xl">その他のリクエスト情報</h2>
  <section class="p-4 grid grid-cols-2 gap-4 border border-indigo-700">
    <div>HTTPリクエストメソッド</div><div>{{ $method }}</div>
    <div>パス</div><div>{{ $path }}</div>
    <div>URL</div><div>{{ $url }}</div>
    <div>IPアドレス</div><div>{{ $ip }}</div>
  </section>
</x-base>