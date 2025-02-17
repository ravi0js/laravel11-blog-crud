<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Blog List</h2>
                <a href="{{ route('blog.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Create New Blog</a>
            </div>
            
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Title</th>
                        <th class="border border-gray-300 p-2">Description</th>
                        <th class="border border-gray-300 p-2">Created At</th>
                        <th class="border border-gray-300 p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 p-2 text-center">{{ $blog->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $blog->title }}</td>
                            <td class="border border-gray-300 p-2">{{ $blog->description }}</td>
                            <td class="border border-gray-300 p-2">{{ $blog->created_at }}</td>
                            <td class="border border-gray-300 p-2 flex space-x-2 justify-center">
                                <a href="{{ route('blog.show', $blog) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600">View</a>
                                <a href="{{ route('blog.edit', $blog) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('blog.destroy', $blog) }}" method="post">
                                   @method("DELETE")
                                   @csrf
                                   <button onclick="return confirm('Are you sure want to delete?')" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
