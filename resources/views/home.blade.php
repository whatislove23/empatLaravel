@extends("layouts.index")
@section("title", "Products store")
@section("content")
    <div class="container mx-auto flex flex-col items-center">
        <div class="flex max-w-2xl flex-col gap-5">
            <h1 class="text-center text-4xl font-medium text-gray-500">
                Welcome to our product store
            </h1>
            <img
                src="https://i0.wp.com/blocksmag.com/wp-content/uploads/2021/10/LEGOLondon.jpg?fit=800%2C445&ssl=1"
                alt=""
            />
            <p class="max-w text-gray-500">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit
                temporibus dignissimos ex corrupti doloribus soluta aliquam
                ratione obcaecati sed voluptas voluptatibus, error officia
                eligendi laborum reiciendis laudantium perspiciatis, magni sunt?
            </p>
            <a
                href="{{ url("products") }}"
                class="max-w-xs cursor-pointer self-center rounded bg-green-600 p-2 text-center text-white shadow transition hover:scale-105"
            >
                Visit our store
            </a>
        </div>
    </div>
@endsection
