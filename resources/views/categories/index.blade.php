@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<style>
.categories-hero {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
    padding: 4rem 0 6rem;
    margin: -80px -15px 3rem -15px;
    position: relative;
    overflow: hidden;
}

.categories-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect x="10" y="10" width="15" height="15" fill="rgba(255,255,255,0.08)" rx="3"/><rect x="70" y="20" width="10" height="10" fill="rgba(255,255,255,0.08)" rx="2"/><rect x="30" y="60" width="12" height="12" fill="rgba(255,255,255,0.08)" rx="2"/><rect x="80" y="70" width="8" height="8" fill="rgba(255,255,255,0.08)" rx="1"/></svg>');
    animation: float 25s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(180deg); }
}

.categories-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
    padding-top: 2rem;
}

.categories-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.categories-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.categories-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.category-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff9a9e, #fad0c4, #ffeaa7, #fab1a0, #fd79a8);
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(255, 154, 158, 0.2);
}

.category-header {
    background: linear-gradient(135deg, #ffeaa7 0%, #fab1a0 100%);
    padding: 2rem 1.5rem;
    text-align: center;
    position: relative;
}

.category-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: #8b4513;
}

.category-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #8b4513;
    margin-bottom: 0.5rem;
}

.category-count {
    background: rgba(255, 255, 255, 0.8);
    color: #8b4513;
    padding: 0.3rem 0.8rem;
    border-radius: 15px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.category-body {
    padding: 1.5rem;
}

.category-description {
    color: #495057;
    line-height: 1.6;
    font-size: 1rem;
    margin-bottom: 1.5rem;
    min-height: 3rem;
}

.category-actions {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1rem 1.5rem;
    border-top: 1px solid rgba(0,0,0,0.1);
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.btn-modern {
    border: none;
    border-radius: 10px;
    padding: 0.6rem 1.2rem;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    flex: 1;
    justify-content: center;
}

.btn-view {
    background: linear-gradient(45deg, #ff9a9e, #fecfef);
    color: #8b1538;
}

.btn-view:hover {
    color: #8b1538;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 154, 158, 0.4);
}

.btn-edit {
    background: linear-gradient(45deg, #ffeaa7, #fab1a0);
    color: #8b4513;
}

.btn-edit:hover {
    color: #8b4513;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(251, 177, 160, 0.4);
}

.btn-delete {
    background: linear-gradient(45deg, #fd79a8, #fdcb6e);
    color: #8b1538;
}

.btn-delete:hover {
    color: #8b1538;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(253, 121, 168, 0.4);
}

.btn-create {
    background: linear-gradient(45deg, #ff9a9e, #fecfef);
    color: white;
    border: none;
    border-radius: 15px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 8px 25px rgba(255, 154, 158, 0.3);
}

.btn-create:hover {
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(255, 154, 158, 0.4);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    margin: 2rem auto;
    max-width: 600px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.empty-state-icon {
    font-size: 4rem;
    color: #ff9a9e;
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .categories-hero h1 {
        font-size: 2rem;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
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
                        <div class="category-count">
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
                        <a href="{{ route('categories.show', $category->id) }}" class="btn-modern btn-view">
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
