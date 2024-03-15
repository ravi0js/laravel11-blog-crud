<x-app-layout>
    <div>
        <div class="container">
            <h2>Blog Details</h2>
            <div class="blog-details">
                <h3>Title:</h3>
                <p>{{ $blog->title }}</p>
            </div>
            <div class="blog-details">
                <h3>Description:</h3>
                <p>{{ $blog->description }}</p>
            </div>
            <div class="blog-details">
                <h3>Created At:</h3>
                <p>{{ $blog->created_at }}</p>
            </div>
            <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
            <a href="{{ route('blog.edit', $blog) }}" class="action-link edit-link">Edit</a>
        </div>
    </div>
</x-app-layout>