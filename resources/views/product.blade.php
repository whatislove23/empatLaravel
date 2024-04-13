@extends("layouts.index")
@section("title", "Product | " . $item["product_name"])
@section("content")
    <div class="container mx-auto flex justify-center">
        <div class="flex gap-20 rounded border-2 p-10">
            <div class="h-64 overflow-hidden rounded-md bg-gray-700">
                <img
                    src="data:image/jpeg;base64,{{ base64_encode($item["img"]) }}"
                    alt="{{ $item["product_name"] }}"
                    class="h-full w-full object-contain"
                />
            </div>
            <div class="flex flex-col gap-5">
                <h2 class="text-3xl font-bold text-gray-700">
                    {{ $item["product_name"] }}
                </h2>
                <div class="flex items-center justify-between">
                    <p class="text-gray-700">USD {{ $item["price"] }}</p>
                    @if ($item["sale"])
                        <p
                            class="rounded bg-yellow-400 px-2 text-gray-700 shadow"
                        >
                            Sale
                        </p>
                    @endif
                </div>
                <button
                    class="cursor-pointer rounded bg-green-600 p-2 text-white shadow transition hover:scale-105"
                >
                    Add to cart
                </button>
                <details class="w-64 text-gray-700">
                    <summary class="cursor-pointer">
                        Product description
                    </summary>
                    {{ $item["description"] }}
                </details>
            </div>
        </div>
    </div>
@endsection
