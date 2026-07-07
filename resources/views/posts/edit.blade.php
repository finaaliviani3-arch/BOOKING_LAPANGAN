@extends(auth()->user() && auth()->user()->role === 'admin' ? 'layouts.admin' : 'layouts.user')

@section('content')
<div class="container">
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            @error('title')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>
            @error('content')<div class="text-danger small">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection

