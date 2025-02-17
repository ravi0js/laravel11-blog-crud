<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Blog Details</h2>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Title:</h3>
                <p class="text-gray-600">{{ $blog->title }}</p>
            </div>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Description:</h3>
                <p class="text-gray-600">{{ $blog->description }}</p>
            </div>
            
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Created At:</h3>
                <p class="text-gray-600">{{ $blog->created_at }}</p>
            </div>
            
            <div class="flex space-x-4">
                <a href="{{ route('blog.index') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Back</a>
                <a href="{{ route('blog.edit', $blog) }}" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 transition">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>
