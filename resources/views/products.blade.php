@extends("layouts.index")
@section("title", "Products")
@section("content")
    <div class="container mx-auto flex flex-col gap-5">
        <h2 class="text-xl font-bold text-gray-700">Products</h2>
        <div class="flex items-center gap-2">
            <div class="flex flex-wrap gap-5">
                <a
                    href="{{ url("/products") }}"
                    class="{{ "products" == last(explode("/", url()->current())) ? "bg-blue-500 text-white" : "bg-gray-300" }} min-w-max rounded px-4 py-2 shadow"
                >
                    Всі
                </a>
                @foreach ($categories as $category)
                    <a
                        href="{{ url("/products/category/{$category["id"]}") }}"
                        class="{{ $category["id"] == last(explode("/", url()->current())) ? "bg-blue-500 text-white" : "bg-gray-300" }} min-w-max rounded px-4 py-2 shadow"
                    >
                        {{ $category["name"] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-6 grid grid-cols-4 gap-10">
            <x-add-card />
            @foreach ($products as $product)
                <x-product-card
                    :id="$product['id']"
                    :title="$product['product_name']"
                    :description="$product['description']"
                    :price="$product['price']"
                    :sale="$product['sale']"
                    :img="$product['img_path']"
                />
            @endforeach
        </div>
    </div>
@endsection
