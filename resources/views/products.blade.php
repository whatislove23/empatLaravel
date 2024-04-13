@extends("layouts.index")
@section("title", "Products")
@section("content")
    <div class="container mx-auto flex flex-col gap-5">
        <h2 class="text-xl font-bold text-gray-700">Products</h2>
        <div class="grid grid-cols-4 gap-10">
            <x-add-card />
            @foreach ($products as $product)
                <x-product-card
                    :id="$product['id']"
                    :title="$product['product_name']"
                    :description="$product['description']"
                    :price="$product['price']"
                    :sale="$product['sale']"
                    :img="$product['img']"
                />
            @endforeach
        </div>
    </div>
@endsection
