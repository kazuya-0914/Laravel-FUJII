@foreach ($columns as $column)
<div class="h-full bg-sky-200">{{ $product->$column }}</div>
@endforeach