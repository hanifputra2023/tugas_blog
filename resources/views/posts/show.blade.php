@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">{{ $post->title }}</h1>
                    @auth
                        @if(auth()->user()->role === 'admin' || 
                            (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                            <div class="btn-group">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <small class="text-muted">
                            👤 <strong>Penulis:</strong> {{ $post->user->name }}
                        </small>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            📅 {{ $post->created_at->format('d M Y, H:i') }}
                        </small>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="badge bg-secondary">🏷️ {{ $post->category->name }}</span>
                </div>

                @if($post->desc)
                    <div class="alert alert-light mb-4">
                        <strong>📄 Deskripsi:</strong> {{ $post->desc }}
                    </div>
                @endif

                <div class="post-content">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">← Kembali ke Daftar Post</a>
            </div>
        </div>
    </div>
</div>
@endsection
