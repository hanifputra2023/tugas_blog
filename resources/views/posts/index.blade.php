@extends('layouts.app')

@section('title', 'Daftar Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📚 Daftar Posts</h1>
    @auth
        @if(in_array(auth()->user()->role, ['admin', 'author']))
            <a href="{{ route('posts.create') }}" class="btn btn-primary">➕ Buat Post Baru</a>
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-primary">🔐 Login untuk Menulis</a>
    @endauth
</div>

@if($posts->count() > 0)
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->desc ?: $post->body, 100) }}</p>
                        <div class="text-muted small mb-2">
                            👤 {{ $post->user->name }} | 
                            🏷️ {{ $post->category->name }} | 
                            📅 {{ $post->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary btn-sm">👁️ Lihat</a>
                            
                            @auth
                                @if(auth()->user()->role === 'admin' || 
                                    (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-5">
        <h3>📭 Belum ada post</h3>
        <p>Mulai buat post pertama Anda!</p>
        @auth
            @if(in_array(auth()->user()->role, ['admin', 'author']))
                <a href="{{ route('posts.create') }}" class="btn btn-primary">➕ Buat Post Baru</a>
            @else
                <div class="alert alert-info">
                    🔒 Sebagai <strong>Guest</strong>, Anda hanya bisa membaca post. 
                    Hubungi admin untuk upgrade ke Author.
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">🔐 Login untuk Menulis</a>
        @endauth
    </div>
@endif
@endsection
