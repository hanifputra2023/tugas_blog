@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">🏷️ {{ $category->name }}</h1>
                    @auth
                        @if(auth()->user()->role !== 'guest' && auth()->user()->role !== 'author')
                        <div class="btn-group">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
                @if($category->desc)
                    <div class="alert alert-light mb-4">
                        <strong>📄 Deskripsi:</strong> {{ $category->desc }}
                    </div>
                @endif

                <h4>📚 Post dalam kategori ini ({{ $category->posts->count() }})</h4>
                
                @if($category->posts->count() > 0)
                    <div class="row">
                        @foreach($category->posts as $post)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                                                {{ $post->title }}
                                            </a>
                                        </h6>
                                        <p class="card-text small">{{ Str::limit($post->desc ?: $post->body, 80) }}</p>
                                        <div class="text-muted small">
                                            👤 {{ $post->user->name }} | 📅 {{ $post->created_at->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-muted">Belum ada post dalam kategori ini.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">➕ Buat Post Baru</a>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Kembali ke Daftar Kategori</a>
            </div>
        </div>
    </div>
</div>
@endsection
