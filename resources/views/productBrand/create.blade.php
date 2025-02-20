<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Create Brand</h2>

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productBrand.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <div>
                    <label for="brand_name" class="block text-gray-700 font-medium">Brand Name</label>
                    <input type="text" id="brand_name" name="brand_name" value="{{ old('brand_name') }}" placeholder="Enter product_brand name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @error('brand_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="brand_icon" class="block text-gray-700 font-medium">Brand Icon</label>
                    <input type="file" id="brand_icon" name="brand_icon" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" onchange="previewImage(event, 'iconPreview')">
                    <img id="iconPreview" src="#" alt="Icon Preview" class="hidden mt-2 w-24 h-24 object-cover rounded-lg">
                    @error('brand_icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="banner" class="block text-gray-700 font-medium">Banner</label>
                    <input type="file" id="banner" name="banner" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300" onchange="previewImage(event, 'bannerPreview')">
                    <img id="bannerPreview" src="#" alt="Banner Preview" class="hidden mt-2 w-full h-32 object-cover rounded-lg">
                    @error('banner')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="background_color" class="block text-gray-700 font-medium">Background Color</label>
                    <input type="text" id="background_color" name="background_color" value="{{ old('background_color') }}" placeholder="Enter background color" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @error('background_color')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="tagline" class="block text-gray-700 font-medium">Tagline</label>
                    <input type="text" id="tagline" name="tagline" value="{{ old('tagline') }}" placeholder="Enter tagline" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @error('tagline')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" placeholder="Enter description" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-medium">Status</label>
                    <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Create Brand</button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('productBrand.index') }}" class="text-blue-600 hover:underline">Back</a>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            const preview = document.getElementById(previewId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add("hidden");
            }
        }
    </script>
</x-app-layout>
