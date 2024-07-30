<x-base title="Laravel基礎">
  <h1 class="text-2xl mb-6">お問い合わせ</h1>
  <form action="{{ route('requests.confirm') }}" method="post">
    @csrf
    <section class="p-4 grid grid-cols-2 gap-4 border border-indigo-700">
      <label>お名前</label>
      <input type="text" name="user_name" class="border rounded w-full py-2 px-3">
      <label>メールアドレス</label>
      <input type="email" name="user_email" class="border rounded w-full py-2 px-3">
      <label>性別</label>
      <div>
        <input type="radio" name="user_gender" value="男性" checked>男性
        <input type="radio" name="user_gender" value="女性">女性
      </div>
      <label>お問い合わせ種別</label>
      <div>
        <select name="category" class="border rounded w-full py-2 px-3">
          <option value="ご意見やご感想">ご意見やご感想</option>
          <option value="不具合について">不具合について</option>
          <option value="その他">その他</option>
        </select> 
      </div>
      <label>お問い合わせ内容</label>
      <textarea name="message" rows="5" class="border rounded w-full py-2 px-3"></textarea>
    </section>
    
    <section class="p-4 text-center">
      <button type="submit" value="submit" class="px-4 py-2 mr-2 text-white bg-indigo-500 rounded-lg">送信</button>
    </section>
  </form>
</x-base>