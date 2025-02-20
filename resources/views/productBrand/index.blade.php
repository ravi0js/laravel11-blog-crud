<x-app-layout>
    <div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Brand List</h2>
                <a href="{{ route('productBrand.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">Create New Brand</a>
            </div>
            
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Brand Name</th>
                        <th class="border border-gray-300 p-2">Tagline</th>
                        <th class="border border-gray-300 p-2">Status</th>
                        <th class="border border-gray-300 p-2">Created At</th>
                        <th class="border border-gray-300 p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl = 1; @endphp
                    @foreach($product_brands as $product_brand)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 p-2 text-center">{{ $sl }}</td>
                            <td class="border border-gray-300 p-2">{{ $product_brand->brand_name }}</td>
                            <td class="border border-gray-300 p-2">{{ $product_brand->tagline }}</td>
                            <td class="border border-gray-300 p-2">
                                <span class="px-2 py-1 rounded-lg text-white {{ $product_brand->status == 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ ucfirst($product_brand->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 p-2">{{ $product_brand->created_at->format('Y-m-d') }}</td>
                            <td class="border border-gray-300 p-2 flex space-x-2 justify-center">
                                <a href="{{ route('productBrand.show', $product_brand) }}" class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600">View</a>
                                <a href="{{ route('productBrand.edit', $product_brand) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('productBrand.destroy', $product_brand) }}" method="post">
                                   @method("DELETE")
                                   @csrf
                                   <button onclick="return confirm('Are you sure want to delete?')" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php $sl += 1; @endphp
                    @endforeach
                </tbody>
            </table>
            
            <div class="mt-4">
                {{ $product_brands->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
