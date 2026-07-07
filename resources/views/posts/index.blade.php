@extends(auth()->user() && auth()->user()->role === 'admin' ? 'layouts.admin' : 'layouts.user')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Posts</h2>
        @if(auth()->user() && auth()->user()->role === 'admin')
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Buat Post</a>
        @else
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Buat Post</a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title mb-1">{{ $post->title }}</h5>
                    <small class="text-muted">{{ $post->user?->name ?? '-' }}</small>
                </div>
                <p class="card-text text-muted" style="max-height:3.6em; overflow:hidden;">
{{ \Illuminate\Support\Str::limit($post->content, 160) }}
                </p>
                <div class="d-flex gap-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">Detail</a>
                    @if(auth()->user() && auth()->user()->role === 'user' && $post->user_id === auth()->id())
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    @endif
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Hapus post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>
@endsection

