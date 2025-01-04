@props(['products', 'title' => null])

@if ($title)
    <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">{{ $title }}
    </h2>
@endif
<div class="mt-6">
    <div class="grid md:grid-cols-4 grid-cols-2 gap-4">
        @foreach ($products as $product)
            <x-product :product="$product" />
        @endforeach
    </div>
</div>
