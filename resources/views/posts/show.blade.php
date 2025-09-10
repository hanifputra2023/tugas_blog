@extends('layouts.app')

@section('title', $post->title)

@section('content')
<style>
/* News Article Style - Inspired by Kompas.com */
.article-header {
    background: #1e3a8a;
    color: white;
    padding: 2rem 0;
    margin: -80px -15px 0 -15px;
    border-bottom: 3px solid #dc2626;
}

.article-breadcrumb {
    background: #f8fafc;
    border-bottom: 1px solid #e5e7eb;
    padding: 0.75rem 0;
    margin: 0 -15px 2rem -15px;
    font-size: 0.9rem;
}

.breadcrumb {
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
}

.breadcrumb a {
    color: #1e3a8a;
    text-decoration: none;
    font-weight: 600;
}

.breadcrumb a:hover {
    color: #dc2626;
    text-decoration: underline;
}

.article-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
    background: white;
}

.article-header-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 1rem;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: white;
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.category-badge {
    background: #dc2626;
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 15px;
    font-weight: 600;
    font-size: 0.85rem;
}

.article-content {
    background: white;
    padding: 3rem 2rem;
    line-height: 1.8;
    font-size: 1.1rem;
    color: #374151;
}

.article-lead {
    font-size: 1.3rem;
    font-weight: 500;
    color: #1f2937;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: #f8fafc;
    border-left: 4px solid #1e3a8a;
    border-radius: 0 8px 8px 0;
}

.article-body {
    margin-top: 2rem;
}

.article-body p {
    margin-bottom: 1.5rem;
    text-align: justify;
    color: #374151;
}

.article-body p:first-child::first-letter {
    font-size: 3.5rem;
    font-weight: 700;
    float: left;
    line-height: 1;
    margin: 0.1rem 0.5rem 0 0;
    color: #1e3a8a;
}

.article-actions {
    background: #f8fafc;
    border-top: 2px solid #e5e7eb;
    padding: 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.btn-news {
    padding: 0.75rem 1.5rem;
    border-radius: 6px;
    font-weight: 600;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.95rem;
}

.btn-back {
    background: #1e3a8a;
    color: white;
}

.btn-back:hover {
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

.article-info {
    color: #6b7280;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.related-articles {
    background: #f8fafc;
    padding: 2rem;
    margin-top: 2rem;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.related-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #dc2626;
}

@media (max-width: 768px) {
    .article-title {
        font-size: 1.8rem;
    }
    
    .article-meta {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .meta-item {
        justify-content: center;
    }
    
    .article-content {
        padding: 2rem 1rem;
        font-size: 1rem;
    }
    
    .article-lead {
        font-size: 1.1rem;
        padding: 1rem;
    }
    
    .article-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
    
    .btn-news {
        justify-content: center;
        width: 100%;
    }
    
    .article-body p:first-child::first-letter {
        font-size: 2.5rem;
    }
}
</style>

<div class="article-header">
    <div class="article-header-content">
        <h1 class="article-title">{{ $post->title }}</h1>
        
        <div class="article-meta">
            <div class="meta-item">
                <i class="fas fa-user"></i>
                <span>{{ $post->user->name }}</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-clock"></i>
                <span>{{ $post->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="category-badge">
                <i class="fas fa-tag me-1"></i>
                {{ $post->category->name }}
            </div>
        </div>
    </div>
</div>

<div class="article-breadcrumb">
    <div class="container">
        <nav class="breadcrumb">
            <a href="{{ route('posts.index') }}">Home</a>
            <span>/</span>
            <a href="#">{{ $post->category->name }}</a>
            <span>/</span>
            <span>{{ Str::limit($post->title, 50) }}</span>
        </nav>
    </div>
</div>

<div class="article-container">
    <article class="article-content">
        @if($post->desc)
            <div class="article-lead">
                <strong>{{ $post->desc }}</strong>
            </div>
        @endif
        
        <div class="article-body">
            {!! nl2br(e($post->body)) !!}
        </div>
    </article>
    
    <div class="article-actions">
        <a href="{{ route('posts.index') }}" class="btn-news btn-back">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>
        
        <div class="d-flex gap-2">
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
        
        <div class="article-info">
            <i class="fas fa-clock"></i>
            <span>Diperbarui: {{ $post->updated_at->format('d M Y, H:i') }}</span>
        </div>
    </div>
</div>
@endsection
