<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Update Brand</h2>
            
            <form action="{{ route('productBrand.update', $product_brand) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @method("PUT")
                @csrf

                <!-- Brand Name -->
                <div>
                    <label for="brand_name" class="block text-gray-700 font-medium">Brand Name:</label>
                    <input type="text" id="brand_name" name="brand_name" value="{{ $product_brand->brand_name }}" placeholder="Enter brand name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Brand Icon -->
                <div>
                    <label for="brand_icon" class="block text-gray-700 font-medium">Brand Icon:</label>
                    <input type="file" id="brand_icon" name="brand_icon" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" onchange="previewImage(event, 'brand_icon_preview')">
                    
                    @if ($product_brand->brand_icon)
                        <img id="brand_icon_preview" src="{{ Storage::url($product_brand->brand_icon) }}" class="mt-2 w-32 h-32 object-cover rounded-lg border" alt="Brand Icon">
                    @else
                        <img id="brand_icon_preview" class="mt-2 w-32 h-32 object-cover rounded-lg border hidden" alt="Brand Icon">
                    @endif
                </div>

                <!-- Banner Image -->
                <div>
                    <label for="banner" class="block text-gray-700 font-medium">Banner:</label>
                    <input type="file" id="banner" name="banner" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" onchange="previewImage(event, 'banner_preview')">
                    
                    @if ($product_brand->banner)
                        <img id="banner_preview" src="{{ Storage::url($product_brand->banner) }}" class="mt-2 w-full h-32 object-cover rounded-lg border" alt="Banner Image">
                    @else
                        <img id="banner_preview" class="mt-2 w-full h-32 object-cover rounded-lg border hidden" alt="Banner Image">
                    @endif
                </div>

                <!-- Background Color -->
                <div>
                    <label for="background_color" class="block text-gray-700 font-medium">Background Color:</label>
                    <input type="text" id="background_color" name="background_color" value="{{ $product_brand->background_color }}" placeholder="Enter background color" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Tagline -->
                <div>
                    <label for="tagline" class="block text-gray-700 font-medium">Tagline:</label>
                    <input type="text" id="tagline" name="tagline" value="{{ $product_brand->tagline }}" placeholder="Enter tagline" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description:</label>
                    <textarea id="description" name="description" placeholder="Enter description" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">{{ $product_brand->description }}</textarea>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-gray-700 font-medium">Status:</label>
                    <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        <option value="active" {{ $product_brand->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $product_brand->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">Update Brand</button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="{{ route('productBrand.index') }}" class="text-blue-600 hover:underline">Back</a>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    const output = document.getElementById(previewId);
                    output.src = reader.result;
                    output.classList.remove("hidden"); // Make image visible
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
