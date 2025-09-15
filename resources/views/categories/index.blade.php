@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<style>
body {
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Inter', sans-serif;
}

.categories-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    position: relative;
    overflow: hidden;
}

.categories-hero {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    color: #fff;
    padding: 3rem 0 4rem;
    margin: -80px -15px 2rem -15px;
    text-align: center;
    border-radius: 0 0 32px 32px;
    box-shadow: 0 12px 40px rgba(79,140,255,0.13);
    backdrop-filter: blur(6px);
}

.categories-hero h1 {
    font-size: 2.5rem;
    font-weight: 900;
    margin-bottom: 1rem;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.categories-hero p {
    font-size: 1.1rem;
    opacity: 0.97;
    margin-bottom: 2rem;
}

.categories-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.category-card {
    background: rgba(255,255,255,0.96);
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(60, 80, 120, 0.10);
    border: 1.5px solid #e3e6ee;
    padding: 1.7rem 1.3rem;
    transition: box-shadow 0.3s, transform 0.2s;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(3px);
    position: relative;
    overflow: hidden;
}

.category-card:hover {
    box-shadow: 0 16px 48px rgba(60, 80, 120, 0.13);
    transform: translateY(-4px) scale(1.02);
}

.category-header {
    background: #f8fafc;
    padding: 1.5rem 1rem 1rem 1rem;
    text-align: center;
    border-radius: 14px 14px 0 0;
}

.category-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #23395d;
    margin-bottom: 0.5rem;
}

.category-meta {
    color: #495057;
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
}

.category-badge {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    color: #23395d;
    padding: 0.3rem 0.8rem;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    box-shadow: 0 1px 4px rgba(79,140,255,0.06);
}

.category-body {
    padding: 1rem 1.5rem;
    flex: 1;
    color: #495057;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1.2rem;
    min-height: 2.5rem;
}

.category-actions {
    background: #f8fafc;
    padding: 0.8rem 1rem;
    border-top: 1.5px solid #e3e6ee;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    border-radius: 0 0 14px 14px;
    box-shadow: 0 1px 4px rgba(79,140,255,0.05);
    z-index: 1;
}

.btn-modern {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    color: #fff;
    border: none;
    border-radius: 14px;
    padding: 10px 22px;
    font-weight: 700;
    font-size: 1rem;
    box-shadow: 0 2px 12px rgba(79,140,255,0.10);
    transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

.btn-modern:hover {
    box-shadow: 0 8px 24px rgba(79,140,255,0.18);
    transform: translateY(-2px) scale(1.04);
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
}

.btn-edit {
    background: #e3e6ee;
    color: #23395d;
    font-weight: 700;
}

.btn-edit:hover {
    background: #cfd8e3;
    color: #23395d;
}

.btn-delete {
    background: #fff0f0;
    color: #c82333;
    font-weight: 700;
}

.btn-delete:hover {
    background: #ffeaea;
    color: #a71d2a;
}

.btn-create {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    color: #fff;
    border: none;
    border-radius: 16px;
    padding: 1rem 2rem;
    font-weight: 900;
    font-size: 1.1rem;
    transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 16px rgba(79,140,255,0.13);
}

.btn-create:hover {
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 32px rgba(79,140,255,0.18);
}

.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    background: #fff;
    border-radius: 14px;
    margin: 2rem auto;
    max-width: 500px;
    border: 1.5px solid #e3e6ee;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.empty-state-icon {
    font-size: 3rem;
    color: #4f8cff;
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: #23395d;
    font-weight: 700;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 2rem;
}

@media (max-width: 900px) {
    .categories-hero h1 {
        font-size: 1.5rem;
    }
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    .category-actions {
        flex-direction: column;
    }
}
</style>

<div class="categories-hero">
    <div class="container">
        <div class="categories-hero-content">
            <h1><i class="fas fa-tags me-3"></i>Kategori Blog</h1>
            <p>Jelajahi berbagai topik menarik yang tersedia</p>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('categories.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Kategori Baru
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="categories-container">
    @if($categories->count() > 0)
        <div class="categories-grid">
            @foreach($categories as $category)
                <div class="category-card">
                    <div class="category-header">
                        <div class="category-icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <h2 class="category-title">{{ $category->name }}</h2>
                        <div class="category-badge">
                            <i class="fas fa-file-alt"></i>
                            <span>{{ $category->posts_count }} artikel</span>
                        </div>
                    </div>
                    <div class="category-body">
                        <p class="category-description">
                            {{ $category->desc ?: 'Kategori ini belum memiliki deskripsi. Jelajahi artikel-artikel di dalamnya untuk menemukan konten menarik.' }}
                        </p>
                    </div>
                    <div class="category-actions">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn-modern">
                            <i class="fas fa-eye"></i>
                            Lihat Artikel
                        </a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn-modern btn-edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" style="flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-delete w-100" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-tags"></i>
            </div>
            <h3>Belum Ada Kategori</h3>
            <p>Mulai mengorganisir blog dengan membuat kategori pertama untuk mengelompokkan artikel-artikel Anda!</p>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('categories.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Kategori Pertama
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>
@endsection
