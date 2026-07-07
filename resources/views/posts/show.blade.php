@extends(auth()->user() && auth()->user()->role === 'admin' ? 'layouts.admin' : 'layouts.user')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2>{{ $post->title }}</h2>
            <div class="text-muted">oleh {{ $post->user?->name ?? '-' }} • {{ $post->created_at?->format('d M Y H:i') }}</div>
        </div>

        @if(auth()->user() && auth()->user()->role === 'admin')
            <div class="d-flex gap-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus post?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                </form>
            </div>
        @elseif(auth()->user() && auth()->user()->role === 'user' && $post->user_id === auth()->id())
            <div class="d-flex gap-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus post?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                </form>
            </div>
        @endif
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0">{{ $post->content }}</p>
        </div>
    </div>

    <h4>Komentar</h4>

    @foreach($post->comments as $comment)
        <div class="border rounded p-3 mb-2">
            <div class="d-flex justify-content-between">
                <strong>{{ $comment->user?->name ?? '-' }}</strong>
                <small class="text-muted">{{ $comment->created_at?->format('d M Y H:i') }}</small>
            </div>
            <div>{{ $comment->content }}</div>
        </div>
    @endforeach

    @if(auth()->user())
        <hr>
        <form method="POST" action="{{ url('comments') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="mb-2">
                <label class="form-label">Tulis komentar</label>
                <textarea name="content" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

        @if(auth()->user()->role === 'user' && $post->user_id !== auth()->id())
            <div class="alert alert-warning mt-3">
                User hanya bisa komentar pada post miliknya sendiri.
            </div>
        @endif
    @endif
</div>
@endsection

