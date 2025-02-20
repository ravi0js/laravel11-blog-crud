<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Brand Details</h2>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Brand Name:</h3>
                <p class="text-gray-600">{{ $product_brand->brand_name }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Tagline:</h3>
                <p class="text-gray-600">{{ $product_brand->tagline }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Description:</h3>
                <p class="text-gray-600">{{ $product_brand->description }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Status:</h3>
                <span class="px-3 py-1 rounded-lg text-white {{ $product_brand->status == 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                    {{ ucfirst($product_brand->status) }}
                </span>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Created At:</h3>
                <p class="text-gray-600">{{ $product_brand->created_at }}</p>
            </div>

            <div class="flex space-x-4">
                <a href="{{ route('productBrand.index') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Back</a>
                {{-- <a href="{{ route('product_brands.edit', $product_brand) }}" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 transition">Edit</a> --}}
            </div>
        </div>
    </div>
</x-app-layout>
