

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
        @if (false)
            <img class="p-8 rounded-t-lg" src="{{ asset('storage/ads/' . $ad->id . '/images').'/'.$ad->images->first()->url }}" alt="product image" />
        @else
            <img class="p-8 rounded-t-lg" src="/producto_sin_imagen.png" alt="product image" />
        @endif
    </a>
    <div class="px-5 pb-5">
        <a href="{{ route('ads.show', ['id' => $ad->id]) }}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $ad->name }}</h5>
        </a>

        <div class="flex items-center justify-between mt-5">
            <span class="text-xl font-bold text-gray-900 dark:text-white">₡{{ number_format($ad->price, 0, '', '')  }}</span>
        </div>
        <div class="flex justify-end mt-5">
            <a href="{{ route('ads.show', ['id' => $ad->id]) }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver</a>
        </div>
    </div>
</div>
