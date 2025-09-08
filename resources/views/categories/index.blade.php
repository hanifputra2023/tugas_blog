@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>🏷️ Daftar Kategori</h1>
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('categories.create') }}" class="btn btn-primary">➕ Buat Kategori Baru</a>
        @endif
    @endauth
</div>

@if($categories->count() > 0)
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->desc ?: 'Tidak ada deskripsi' }}</p>
                        <div class="text-muted small mb-2">
                            📊 {{ $category->posts_count }} post(s)
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-primary btn-sm">👁️ Lihat</a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
        <h3>📭 Belum ada kategori</h3>
        <p>Mulai buat kategori pertama Anda!</p>
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('categories.create') }}" class="btn btn-primary">➕ Buat Kategori Baru</a>
            @endif
        @endauth
    </div>
@endif
@endsection
