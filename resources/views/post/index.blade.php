<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Posts</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

        <hr>

        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->body }}</p>
                <p class="card-text"><small class="text-muted">Posted by {{ $post->user->name }}</small></p>

                @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endcan

                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Add Comment</label>
                        <textarea class="form-control" id="comment" name="body" rows="2" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-sm">Comment</button>
                </form>

                <hr>

                @foreach ($post->comments as $comment)
                <div>
                    <strong>{{ $comment->user->name }}</strong>:
                    <p>{{ $comment->body }}</p>

                    @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endcan
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>