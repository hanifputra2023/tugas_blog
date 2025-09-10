@extends('layouts.app')

@section('title', $category->name)

@section('content')
<style>
.category-hero {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 25%, #fecfef 50%, #fcb045 75%, #fd1d1d 100%);
    background-size: 400% 400%;
    animation: categoryGradient 18s ease infinite;
    padding: 5rem 0 7rem;
    margin: -90px -15px 4rem -15px;
    position: relative;
    overflow: hidden;
}

@keyframes categoryGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.category-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150"><defs><pattern id="hexagons" width="30" height="30" patternUnits="userSpaceOnUse"><polygon points="15,5 25,12 25,22 15,29 5,22 5,12" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="150" height="150" fill="url(%23hexagons)"/></svg>');
    animation: hexFloat 30s ease-in-out infinite;
    opacity: 0.6;
}

@keyframes hexFloat {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.category-hero-content {
    position: relative;
    z-index: 2;
    color: white;
    text-align: center;
    padding-top: 3rem;
}

.category-title {
    font-size: 3.5rem;
    font-weight: 900;
    margin-bottom: 2rem;
    background: linear-gradient(45deg, #ffffff, #fff3cd, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(3px 3px 6px rgba(0,0,0,0.4));
    animation: titlePulse 3s ease-in-out infinite;
}

@keyframes titlePulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

.category-stats {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(15px);
    border: 2px solid rgba(255, 255, 255, 0.4);
    padding: 1.5rem 2rem;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    font-size: 1.2rem;
    font-weight: 700;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    margin-bottom: 2rem;
}

.category-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.posts-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.post-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.post-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff9a9e, #fecfef, #fcb045);
    animation: cardShimmer 3s ease-in-out infinite;
}

@keyframes cardShimmer {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

.post-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 25px 50px rgba(255, 154, 158, 0.3);
}

.post-card-body {
    padding: 2rem;
}

.post-card-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #2c3e50;
}

.post-card-title a {
    text-decoration: none;
    color: inherit;
    background: linear-gradient(45deg, #ff9a9e, #fcb045);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all 0.3s ease;
}

.post-card-title a:hover {
    background: linear-gradient(45deg, #fcb045, #fd1d1d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transform: scale(1.02);
}

.post-card-text {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.post-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.9rem;
    color: #868e96;
    padding-top: 1rem;
    border-top: 1px solid rgba(0,0,0,0.1);
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.btn-modern {
    border: none;
    border-radius: 20px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.btn-primary-modern {
    background: linear-gradient(45deg, #ff9a9e, #fcb045);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-primary-modern:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 154, 158, 0.4);
}

.btn-edit {
    background: linear-gradient(45deg, #ffd89b, #19547b);
    color: white;
}

.btn-edit:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 216, 155, 0.4);
}

.btn-delete {
    background: linear-gradient(45deg, #ff6b6b, #feca57);
    color: white;
}

.btn-delete:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 107, 107, 0.4);
}

.btn-back {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.btn-back:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    margin: 2rem 0;
}

.empty-state-icon {
    font-size: 4rem;
    color: #ff9a9e;
    margin-bottom: 1.5rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.description-card {
    background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
    border: 2px solid rgba(255, 154, 158, 0.3);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 3rem;
    position: relative;
    overflow: hidden;
}

.description-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff9a9e, #fcb045, #fd1d1d);
}

.description-title {
    color: #d63031;
    font-weight: 800;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.description-text {
    color: #e17055;
    font-size: 1.1rem;
    line-height: 1.6;
    font-style: italic;
}

@media (max-width: 768px) {
    .category-hero {
        padding: 3rem 0 5rem;
        margin: -90px -15px 2rem -15px;
    }
    
    .category-title {
        font-size: 2.5rem;
    }
    
    .posts-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .category-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-modern {
        width: 80%;
        justify-content: center;
    }
    
    .post-card-body {
        padding: 1.5rem;
    }
}
</style>

<div class="category-hero">
    <div class="container">
        <div class="category-hero-content">
            <h1 class="category-title">
                <i class="fas fa-tag me-3"></i>{{ $category->name }}
            </h1>
            
            <div class="category-stats">
                <i class="fas fa-newspaper"></i>
                <span>{{ $category->posts->count() }} Posts</span>
            </div>
            
            @auth
                @if(auth()->user()->role !== 'guest' && auth()->user()->role !== 'author')
                    <div class="category-actions">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn-modern btn-edit">
                            <i class="fas fa-edit"></i>
                            Edit Kategori
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-modern btn-delete" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                <i class="fas fa-trash"></i>
                                Hapus Kategori
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="posts-container">
    @if($category->desc)
        <div class="description-card">
            <h3 class="description-title">
                <i class="fas fa-info-circle"></i>
                Deskripsi Kategori
            </h3>
            <p class="description-text">{{ $category->desc }}</p>
        </div>
    @endif

    @if($category->posts->count() > 0)
        <div class="posts-grid">
            @foreach($category->posts as $post)
                <div class="post-card">
                    <div class="post-card-body">
                        <h6 class="post-card-title">
                            <a href="{{ route('posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h6>
                        <p class="post-card-text">{{ Str::limit($post->desc ?: $post->body, 100) }}</p>
                        <div class="post-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $post->user->name }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h4 class="mb-3">Belum Ada Post</h4>
            <p class="text-muted mb-4">Kategori ini belum memiliki post. Mulai menulis sekarang!</p>
            <a href="{{ route('posts.create') }}" class="btn-modern btn-primary-modern">
                <i class="fas fa-plus"></i>
                Buat Post Baru
            </a>
        </div>
    @endif
    
    <div class="text-center mt-4">
        <a href="{{ route('categories.index') }}" class="btn-modern btn-back">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Kategori
        </a>
    </div>
</div>
@endsection
