@extends('layouts.app')

@section('title', 'Daftar Posts')

@section('content')
<style>
/* News Portal Style - Inspired by Kompas.com */
.news-header {
    background: #1e3a8a;
    color: white;
    padding: 1.5rem 0;
    margin: -80px -15px 0 -15px;
    border-bottom: 3px solid #dc2626;
}

.news-header h1 {
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0;
    color: white;
}

.news-subtitle {
    font-size: 1rem;
    opacity: 0.9;
    margin-top: 0.5rem;
}

.news-navigation {
    background: #f8fafc;
    border-bottom: 2px solid #e5e7eb;
    padding: 1rem 0;
    margin: 0 -15px 2rem -15px;
}

.nav-menu {
    display: flex;
    gap: 2rem;
    align-items: center;
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-item {
    color: #374151;
    text-decoration: none;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.nav-item:hover {
    background: #1e3a8a;
    color: white;
    text-decoration: none;
}

.nav-item.active {
    background: #dc2626;
    color: white;
}

.main-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 2rem;
}

@media (max-width: 992px) {
    .main-content {
        grid-template-columns: 1fr;
    }
}

.news-list {
    background: white;
}

.news-item {
    display: flex;
    gap: 1rem;
    padding: 1.5rem 0;
    border-bottom: 1px solid #e5e7eb;
    transition: background 0.3s ease;
}

.news-item:hover {
    background: #f9fafb;
}

.news-item:last-child {
    border-bottom: none;
}

.news-thumbnail {
    width: 120px;
    height: 80px;
    background: #f3f4f6;
    border-radius: 6px;
    overflow: hidden;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 2rem;
}

.news-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.news-content {
    flex: 1;
}

.news-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #111827;
    line-height: 1.4;
    margin-bottom: 0.5rem;
    text-decoration: none;
    display: block;
}

.news-title:hover {
    color: #dc2626;
    text-decoration: none;
}

.news-excerpt {
    color: #6b7280;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 0.75rem;
}

.news-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.85rem;
    color: #9ca3af;
    flex-wrap: wrap;
}

.meta-badge {
    background: #1e3a8a;
    color: white;
    padding: 0.2rem 0.6rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.news-actions {
    margin-top: 0.75rem;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.btn-news {
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
}

.btn-read {
    background: #1e3a8a;
    color: white;
}

.btn-read:hover {
    background: #1e40af;
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: #f59e0b;
    color: white;
}

.btn-edit:hover {
    background: #d97706;
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: #dc2626;
    color: white;
}

.btn-delete:hover {
    background: #b91c1c;
    color: white;
}

.sidebar {
    background: white;
}

.sidebar-section {
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.sidebar-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #dc2626;
}

.trending-item {
    padding: 0.75rem 0;
    border-bottom: 1px solid #e5e7eb;
}

.trending-item:last-child {
    border-bottom: none;
}

.trending-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: #374151;
    line-height: 1.4;
    text-decoration: none;
}

.trending-title:hover {
    color: #dc2626;
    text-decoration: none;
}

.trending-date {
    font-size: 0.8rem;
    color: #9ca3af;
    margin-top: 0.3rem;
}

.create-button {
    background: #dc2626;
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
}

.create-button:hover {
    background: #b91c1c;
    color: white;
    text-decoration: none;
}

.empty-news {
    text-align: center;
    padding: 4rem 2rem;
    background: #f9fafb;
    border-radius: 8px;
    border: 2px dashed #d1d5db;
}

.empty-icon {
    font-size: 3rem;
    color: #9ca3af;
    margin-bottom: 1rem;
}

.empty-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 0.5rem;
}

.empty-text {
    color: #6b7280;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .news-item {
        flex-direction: column;
    }
    
    .news-thumbnail {
        width: 100%;
        height: 150px;
    }
    
    .nav-menu {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .news-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>

<div class="news-header">
    <div class="container">
        <h1><i class="fas fa-newspaper me-2"></i>Blog Portal</h1>
        <p class="news-subtitle">Portal Berita dan Artikel Terkini</p>
    </div>
</div>

<div class="news-navigation">
    <div class="container">
        <nav>
            <ul class="nav-menu">
                <li><a href="{{ route('posts.index') }}" class="nav-item active">Home</a></li>
                <li><a href="#" class="nav-item">Berita</a></li>
                <li><a href="#" class="nav-item">Kategori</a></li>
                <li><a href="#" class="nav-item">Tentang</a></li>
                @auth
                    @if(in_array(auth()->user()->role, ['admin', 'author']))
                        <li class="ms-auto">
                            <a href="{{ route('posts.create') }}" class="create-button">
                                <i class="fas fa-plus"></i>
                                Tulis Artikel
                            </a>
                        </li>
                    @endif
                @else
                    <li class="ms-auto">
                        <a href="{{ route('login') }}" class="create-button">
                            <i class="fas fa-sign-in-alt"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</div>

<div class="main-content">
    <div class="news-list">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <article class="news-item">
                    <div class="news-thumbnail">
                        <i class="fas fa-image"></i>
                    </div>
                    
                    <div class="news-content">
                        <a href="{{ route('posts.show', $post->id) }}" class="news-title">
                            {{ $post->title }}
                        </a>
                        
                        <p class="news-excerpt">
                            {{ Str::limit($post->desc ?: $post->body, 150) }}
                        </p>
                        
                        <div class="news-meta">
                            <span><i class="fas fa-user me-1"></i>{{ $post->user->name }}</span>
                            <span class="meta-badge">{{ $post->category->name }}</span>
                            <span><i class="fas fa-clock me-1"></i>{{ $post->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        
                        <div class="news-actions">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn-news btn-read">
                                <i class="fas fa-eye"></i>
                                Baca
                            </a>
                            
                            @auth
                                @if(auth()->user()->role === 'admin' || 
                                    (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn-news btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-news btn-delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                </article>
            @endforeach
        @else
            <div class="empty-news">
                <div class="empty-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="empty-title">Belum Ada Artikel</h3>
                <p class="empty-text">Mulai berbagi berita dan artikel menarik dengan membuat artikel pertama Anda!</p>
                
                @auth
                    @if(in_array(auth()->user()->role, ['admin', 'author']))
                        <a href="{{ route('posts.create') }}" class="create-button">
                            <i class="fas fa-plus"></i>
                            Tulis Artikel Pertama
                        </a>
                    @else
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Informasi:</strong> Sebagai Guest, Anda hanya bisa membaca artikel. 
                            Hubungi administrator untuk upgrade ke Author dan mulai menulis.
                        </div>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="create-button">
                        <i class="fas fa-sign-in-alt"></i>
                        Login untuk Menulis
                    </a>
                @endauth
            </div>
        @endif
    </div>
    
    <aside class="sidebar">
        <div class="sidebar-section">
            <h3 class="sidebar-title">Artikel Terbaru</h3>
            @if($posts->count() > 0)
                @foreach($posts->take(5) as $post)
                    <div class="trending-item">
                        <a href="{{ route('posts.show', $post->id) }}" class="trending-title">
                            {{ Str::limit($post->title, 60) }}
                        </a>
                        <div class="trending-date">{{ $post->created_at->format('d M Y') }}</div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada artikel</p>
            @endif
        </div>
        
        <div class="sidebar-section">
            <h3 class="sidebar-title">Kategori</h3>
            <div class="category-list">
                @php
                    $categories = \App\Models\Category::withCount('posts')->get();
                @endphp
                @foreach($categories as $category)
                    <div class="trending-item">
                        <a href="#" class="trending-title">{{ $category->name }}</a>
                        <div class="trending-date">{{ $category->posts_count }} artikel</div>
                    </div>
                @endforeach
            </div>
        </div>
    </aside>
</div>
@endsection
