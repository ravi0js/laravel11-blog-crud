<x-app-layout>
    <div>
        <div class="container">
            <a href="{{ route('blog.create') }}" class="create-blog-button">Create New Blog</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td class="action-buttons">
                                <a href="{{ route('blog.show', $blog) }}" class="action-link view-link">View</a>
                                <a href="{{ route('blog.edit', $blog) }}" class="action-link edit-link">Edit</a>
                                <form action="{{ route('blog.destroy', $blog) }}" method="post">
                                   @method("DELETE")
                                   @csrf
                                   <button onclick="return confirm('Are you sure want to delete?')"
                                    class="action-link delete-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>