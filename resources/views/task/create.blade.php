<x-app-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Create Task</h2>
            
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('task.store') }}" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @error('title')
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
                    <label for="deadline" class="block text-gray-700 font-medium">Dead Line</label>
                    <input type="datetime-local" id="deadline" name="deadline" placeholder="Enter Deadline" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                    @error('deadline')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Create Task</button>
            </form>
            
            <div class="mt-4 text-center">
                <a href="{{ route('task.index') }}" class="text-blue-600 hover:underline">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>