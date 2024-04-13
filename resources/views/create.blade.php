@extends("layouts.index")
@section("title", "Add product")
@section("content")
    <div class="container mx-auto flex flex-col items-center">
        <form
            action="{{ route("products.addProduct") }}"
            method="POST"
            enctype="multipart/form-data"
            class="flex w-96 flex-col gap-5 rounded border-2 p-10 shadow"
        >
            @csrf
            <h2 class="text-center text-xl">Product creation</h2>
            @if ($errors->any())
                <div class="rounded bg-red-400 p-2 shadow">
                    <ul class="flex flex-col gap-2">
                        @foreach ($errors->all() as $error)
                            <li
                                class="rounded bg-white p-1 text-gray-700 shadow"
                            >
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div
                class="relative h-52 cursor-pointer rounded border-2"
                id="imgField"
            >
                <svg
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 transform cursor-pointer"
                    stroke="currentColor"
                    fill="currentColor"
                    stroke-width="0"
                    viewBox="0 0 20 20"
                    height="40px"
                    width="40px"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M4 5h13v7h2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-2H4V5z"
                    ></path>
                    <path d="m8 11-3 4h11l-4-6-3 4z"></path>
                    <path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"></path>
                </svg>
                <input
                    type="file"
                    name="img"
                    id="productImage"
                    accept="image/*"
                    class="absolute h-52 cursor-pointer opacity-0"
                />
            </div>
            <div
                class="flex hidden h-52 w-full justify-center overflow-hidden object-scale-down"
                id="imgWrap"
            >
                <img src="" alt="" id="previewImage" class="h-full" />
            </div>
            <input
                type="text"
                name="name"
                placeholder="Product name"
                class="rounded border-2 p-2"
            />
            <input
                name="price"
                type="number"
                placeholder="Product price "
                class="rounded border-2 p-2"
            />
            <textarea
                name="description"
                id=""
                cols="30"
                rows="5"
                placeholder="Product description"
                class="rounded border-2 p-2"
            ></textarea>
            <input
                type="submit"
                value="Submit"
                class="cursor-pointer rounded bg-green-600 p-2 text-white shadow transition hover:scale-105"
            />
        </form>
    </div>

    <script>
        document
            .getElementById('productImage')
            .addEventListener('change', function (event) {
                const file = event.target.files[0];
                console.log(file);
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const previewImage =
                            document.getElementById('previewImage');
                        previewImage.src = e.target.result;
                        document
                            .getElementById('imgWrap')
                            .classList.remove('hidden');
                        document
                            .getElementById('imgField')
                            .classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
    </script>
@endsection
