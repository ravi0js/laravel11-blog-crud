<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Update Blog</h2>
            
            <form action="{{ route('blog.update', $blog) }}" method="post" class="space-y-4">
                @method("PUT")
                @csrf
                
                <div>
                    <label for="title" class="block text-gray-700 font-medium">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter title" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                </div>
                
                <div>
                    <label for="description" class="block text-gray-700 font-medium">Description:</label>
                    <textarea id="description" name="description" placeholder="Enter description" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">{{ $blog->description }}</textarea>
                </div>
                
                <button type="submit" class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">Update Blog</button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="{{ route('blog.index') }}" class="text-blue-600 hover:underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
