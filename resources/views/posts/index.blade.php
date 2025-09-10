@extends('layouts.app')

@section('title', 'Portal Berita - Daftar Artikel')

@section('content')
<style>
/* Modern News Portal Design */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8fafc;
    color: #2d3748;
}

/* Header Section */
.news-portal-header {
    background: #1a365d;
    color: white;
    padding: 2rem 0;
    margin: -80px -15px 0 -15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    text-align: center;
}

.portal-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin-bottom: 0.5rem;
    letter-spacing: -1px;
}

.portal-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    font-weight: 300;
}

/* Navigation Bar */
.main-navigation {
    background: #ffffff;
    border-bottom: 3px solid #e53e3e;
    padding: 0;
    margin: 0 -15px 2rem -15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 0;
}

.nav-item {
    flex: 1;
}

.nav-link {
    display: block;
    padding: 1.25rem 1.5rem;
    color: #2d3748;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    text-align: center;
    transition: all 0.3s ease;
    border-bottom: 3px solid transparent;
}

.nav-link:hover {
    background: #1a365d;
    color: white;
    text-decoration: none;
    border-bottom-color: #e53e3e;
}

.nav-link.active {
    background: #e53e3e;
    color: white;
    border-bottom-color: #c53030;
}

/* Main Content Layout */
.content-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 3rem;
}

/* News Articles Section */
.news-main {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.section-header {
    background: #1a365d;
    color: white;
    padding: 1rem 1.5rem;
    font-size: 1.2rem;
    font-weight: 700;
}

.news-list {
    padding: 0;
}

.article-card {
    display: flex;
    gap: 1.5rem;
    padding: 2rem;
    border-bottom: 1px solid #e2e8f0;
    transition: all 0.3s ease;
    background: white;
}

.article-card:hover {
    background: #f7fafc;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.article-card:last-child {
    border-bottom: none;
}

.article-thumbnail {
    width: 180px;
    height: 120px;
    background: #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #a0aec0;
    font-size: 2.5rem;
}

.article-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.article-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
    line-height: 1.3;
    margin-bottom: 0.75rem;
    text-decoration: none;
    display: block;
}

.article-title:hover {
    color: #e53e3e;
    text-decoration: none;
}

.article-excerpt {
    color: #4a5568;
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 1rem;
    flex-grow: 1;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.meta-info {
    display: flex;
    gap: 1.5rem;
    font-size: 0.9rem;
    color: #718096;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.category-badge {
    background: #e53e3e;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.read-more-btn {
    background: #e53e3e;
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
    align-self: flex-start;
}

.read-more-btn:hover {
    background: #c53030;
    color: white;
    text-decoration: none;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(229, 62, 62, 0.3);
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.sidebar-widget {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.widget-header {
    background: #1a365d;
    color: white;
    padding: 1rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 700;
}

.widget-content {
    padding: 1.5rem;
}

.trending-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.trending-item:last-child {
    border-bottom: none;
}

.trending-number {
    width: 30px;
    height: 30px;
    background: #e53e3e;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.trending-content h4 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2d3748;
    line-height: 1.4;
    margin-bottom: 0.25rem;
}

.trending-content h4:hover {
    color: #e53e3e;
}

.trending-meta {
    font-size: 0.8rem;
    color: #718096;
}

/* Footer */
.news-footer {
    background: #1a365d;
    color: white;
    text-align: center;
    padding: 2rem 0;
    margin: 3rem -15px 0 -15px;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Responsive Design */
@media (max-width: 992px) {
    .content-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .portal-title {
        font-size: 2.2rem;
    }
    
    .nav-menu {
        flex-direction: column;
        gap: 0;
    }
    
    .nav-link {
        text-align: left;
        padding: 1rem 1.5rem;
    }
}

@media (max-width: 768px) {
    .article-card {
        flex-direction: column;
        gap: 1rem;
        padding: 1.5rem;
    }
    
    .article-thumbnail {
        width: 100%;
        height: 200px;
    }
    
    .article-title {
        font-size: 1.3rem;
    }
    
    .portal-title {
        font-size: 1.8rem;
    }
    
    .content-wrapper {
        padding: 0 0.5rem;
    }
}

/* Loading Animation */
.loading {
    text-align: center;
    padding: 2rem;
    color: #718096;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    padding: 2rem;
    background: white;
    border-top: 1px solid #e2e8f0;
}
</style>
<!-- Header Portal Berita -->
<div class="news-portal-header">
    <div class="header-content">
        <h1 class="portal-title">
            <i class="fas fa-newspaper"></i>
            Portal Berita
        </h1>
        <p class="portal-subtitle">Berita Terkini dan Artikel Pilihan</p>
    </div>
</div>

<!-- Navigation Menu -->
<div class="main-navigation">
    <div class="nav-container">
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link active">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-newspaper"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-list"></i> Kategori
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-info-circle"></i> Tentang
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Main Content Area -->
<div class="content-wrapper">
    <!-- Main Articles Section -->
    <main class="news-main">
        <div class="section-header">
            <i class="fas fa-newspaper"></i>
            Berita Terkini
            @auth
                @if(in_array(auth()->user()->role, ['admin', 'author']))
                    <a href="{{ route('posts.create') }}" class="read-more-btn" style="float: right; font-size: 0.9rem;">
                        <i class="fas fa-plus"></i> Tulis Artikel
                    </a>
                @endif
            @endauth
        </div>
        
        <div class="news-list">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <article class="article-card">
                        <div class="article-thumbnail">
                            <i class="fas fa-image"></i>
                        </div>
                        
                        <div class="article-content">
                            <a href="{{ route('posts.show', $post->id) }}" class="article-title">
                                {{ $post->title }}
                            </a>
                            
                            <div class="article-meta">
                                <div class="meta-info">
                                    <div class="meta-item">
                                        <i class="fas fa-user"></i>
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ $post->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                </div>
                                <div class="category-badge">
                                    {{ $post->category->name }}
                                </div>
                            </div>
                            
                            <p class="article-excerpt">
                                {{ Str::limit($post->desc ?: strip_tags($post->body), 200) }}
                            </p>
                            
                            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                                <a href="{{ route('posts.show', $post->id) }}" class="read-more-btn">
                                    <i class="fas fa-arrow-right"></i>
                                    Baca Selengkapnya
                                </a>
                                
                                @auth
                                    @if(auth()->user()->role === 'admin' || 
                                        (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                                        <a href="{{ route('posts.edit', $post->id) }}" class="read-more-btn" style="background: #f59e0b;">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="read-more-btn" style="background: #dc2626;" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                <div style="text-align: center; padding: 4rem 2rem; color: #718096;">
                    <i class="fas fa-newspaper" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                    <h3 style="color: #2d3748; margin-bottom: 1rem;">Belum Ada Artikel</h3>
                    <p style="margin-bottom: 2rem;">Mulai berbagi berita dan artikel menarik!</p>
                    
                    @auth
                        @if(in_array(auth()->user()->role, ['admin', 'author']))
                            <a href="{{ route('posts.create') }}" class="read-more-btn">
                                <i class="fas fa-plus"></i> Tulis Artikel Pertama
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="read-more-btn">
                            <i class="fas fa-sign-in-alt"></i> Login untuk Menulis
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </main>
    
    <!-- Sidebar -->
    <aside class="sidebar">
        <!-- Berita Trending -->
        <div class="sidebar-widget">
            <div class="widget-header">
                <i class="fas fa-fire"></i>
                Berita Trending
            </div>
            <div class="widget-content">
                @if($posts->count() > 0)
                    @foreach($posts->take(5) as $index => $post)
                        <div class="trending-item">
                            <div class="trending-number">{{ $index + 1 }}</div>
                            <div class="trending-content">
                                <h4>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ Str::limit($post->title, 60) }}
                                    </a>
                                </h4>
                                <div class="trending-meta">
                                    <i class="fas fa-clock"></i>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style="color: #718096; text-align: center; padding: 1rem;">
                        Belum ada artikel trending
                    </p>
                @endif
            </div>
        </div>
        
        <!-- Kategori -->
        <div class="sidebar-widget">
            <div class="widget-header">
                <i class="fas fa-tags"></i>
                Kategori
            </div>
            <div class="widget-content">
                @php
                    $categories = \App\Models\Category::withCount('posts')->get();
                @endphp
                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <div class="trending-item">
                            <div class="trending-content">
                                <h4>
                                    <a href="#">{{ $category->name }}</a>
                                </h4>
                                <div class="trending-meta">
                                    <i class="fas fa-newspaper"></i>
                                    {{ $category->posts_count }} artikel
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style="color: #718096; text-align: center; padding: 1rem;">
                        Belum ada kategori
                    </p>
                @endif
            </div>
        </div>
    </aside>
</div>

<!-- Footer -->
<footer class="news-footer">
    <div class="footer-content">
        <p>&copy; 2025 Portal Berita. All rights reserved.</p>
        <p style="margin-top: 0.5rem; opacity: 0.8;">
            Powered by Laravel & Built with ❤️
        </p>
    </div>
</footer>

@endsection
