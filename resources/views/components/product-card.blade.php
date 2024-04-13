<a
    href="{{ url("/product/$id") }}"
    class="relative flex h-80 cursor-pointer flex-col justify-between gap-2 rounded border border-2 border-solid p-5 shadow transition hover:scale-105 hover:border-yellow-400"
>
    @if ($sale)
        <p
            class="absolute inset-x-5 inset-y-2 h-min w-min rounded-lg border-none bg-yellow-300 px-2 shadow-lg"
        >
            Sale
        </p>
    @endif

    <div
        class="flex h-48 w-full items-center justify-center overflow-hidden rounded object-cover"
    >
        <img
            class="w-full"
            src="data:image/jpeg;base64,{{ base64_encode($img) }}"
            alt="{{ $title }}"
        />
    </div>
    <h3 class="text-lg font-medium text-gray-700">{{ $title }}</h3>
    <p class="text-gray-700">USD {{ $price }}</p>
</a>
