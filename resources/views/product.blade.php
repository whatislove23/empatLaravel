@extends("layouts.index")
@section("title", "Product | " . $item["product_name"])
@section("content")
    <div class="container mx-auto flex justify-center">
        <div class="flex flex-col gap-2 rounded border-2 p-10">
            <div class="flex gap-10">
                <div class="h-64 overflow-hidden rounded-md bg-gray-700">
                    <img
                        src="{{ asset("storage/" . $item["img_path"]) }}"
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
                    <details class="w-64 overflow-y-auto text-gray-700">
                        <summary class="cursor-pointer">
                            Product description
                        </summary>
                        {{ $item["description"] }}
                    </details>
                </div>
            </div>
            <div class="my-4 flex gap-2">
                @foreach ($categories as $category)
                    <a
                        href="{{ url("/products/category/{$category["id"]}") }}"
                        class="rounded bg-gray-400 px-2 py-1 text-white shadow transition hover:scale-105 hover:bg-gray-500"
                    >
                        {{ $category["name"] }}
                    </a>
                @endforeach
            </div>
            <form
                action="{{ route("product.addFeedback", ["id" => $item["id"]]) }}"
                method="post"
                class="mb-5 flex flex-col gap-2"
            >
                @csrf
                <h2 class="text-center text-lg font-bold text-gray-700">
                    Leave your feedback
                </h2>
                <input
                    name="name"
                    type="text"
                    placeholder="Your name"
                    class="rounded border-2 p-2"
                />
                <textarea
                    name="description"
                    id=""
                    cols="30"
                    rows="5"
                    placeholder="Product feedback"
                    class="rounded border-2 p-2"
                ></textarea>

                <input
                    type="submit"
                    value="Submit"
                    class="cursor-pointer rounded bg-green-600 p-2 text-white shadow transition hover:scale-105"
                />
            </form>
            <h2 class="self-center text-lg font-semibold text-gray-700">
                Our customers feedbacks
            </h2>
            @foreach ($comments as $comment)
                <div class="rounded-lg bg-gray-100 p-2 shadow">
                    <h3 class="text-lg font-semibold text-gray-700">
                        {{ $comment["name"] }}
                    </h3>
                    <p>{{ $comment["description"] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
