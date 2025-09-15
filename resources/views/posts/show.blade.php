@extends('layouts.app')

@section('title', $post->title)

@section('content')
<style>
body {
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Inter', sans-serif;
}

.article-page {
    max-width: 1100px;
    margin: 2.5rem auto;
    padding: 0 1.5rem;
}

.article-card {
    background: rgba(255,255,255,0.92);
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    border: 1.5px solid #e3e6ee;
    overflow: hidden;
    margin-bottom: 2.5rem;
    backdrop-filter: blur(3px);
    position: relative;
}

.article-header {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    color: white;
    padding: 3.2rem 2.2rem 2.2rem 2.2rem;
    text-align: center;
    border-radius: 22px 22px 0 0;
    box-shadow: 0 8px 32px rgba(79,140,255,0.10);
    position: relative;
}

.article-title {
    font-size: 2.7rem;
    font-weight: 900;
    margin-bottom: 1.2rem;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.article-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
    flex-wrap: wrap;
    margin-bottom: 1.2rem;
}

.meta-badge {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    padding: 0.5rem 1.1rem;
    border-radius: 14px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
    color: #23395d;
    font-weight: 600;
    box-shadow: 0 1px 4px rgba(79,140,255,0.06);
}

.category-badge {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    padding: 0.5rem 1.1rem;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1rem;
    color: #23395d;
    border: none;
    margin-top: 0.5rem;
    display: inline-block;
    box-shadow: 0 1px 4px rgba(79,140,255,0.09);
    letter-spacing: 0.5px;
    text-transform: capitalize;
}

.article-content {
    padding: 2.2rem 2.2rem 0 2.2rem;
}

.article-lead {
    font-size: 1.2rem;
    color: #495057;
    font-style: italic;
    text-align: center;
    margin-bottom: 2rem;
    padding: 1.2rem;
    background: #f5f6fa;
    border-radius: 12px;
    border-left: 5px solid #4f8cff;
}

.article-text {
    font-size: 1.13rem;
    line-height: 1.7;
    color: #212529;
    margin-bottom: 2rem;
}

.article-text p {
    margin-bottom: 1.2rem;
    text-align: justify;
}

.stats-section {
    display: flex;
    gap: 2rem;
    margin: 2rem 0;
    padding: 1.2rem;
    background: #f5f6fa;
    border-radius: 12px;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.stat-card {
    text-align: center;
    padding: 1rem;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
    min-width: 120px;
}

.stat-number {
    font-size: 1.3rem;
    font-weight: 700;
    color: #4f8cff;
    display: block;
    margin-bottom: 0.3rem;
}

.stat-label {
    color: #666;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.share-section {
    text-align: center;
    padding: 1.2rem 0;
    background: #f5f6fa;
    border-radius: 12px;
    margin: 2rem 0;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.share-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #23395d;
    margin-bottom: 1rem;
}

.share-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.share-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all 0.2s;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.share-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(79,140,255,0.13);
    text-decoration: none;
}

.share-facebook { background: #1877f2; color: white; }
.share-twitter { background: #1da1f2; color: white; }
.share-whatsapp { background: #25d366; color: white; }
.share-linkedin { background: #0077b5; color: white; }

.action-section {
    padding: 2rem;
    border-top: 1.5px solid #e3e6ee;
    background: #f5f6fa;
    border-radius: 0 0 22px 22px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.2rem;
}

.btn-group {
    display: flex;
    gap: 1.2rem;
    flex-wrap: wrap;
}

.action-btn {
    padding: 0.9rem 1.7rem;
    border: none;
    border-radius: 14px;
    font-weight: 700;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.7rem;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

.action-btn:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 8px 24px rgba(79,140,255,0.13);
    text-decoration: none;
}

.btn-back {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    color: white;
}

.btn-back:hover {
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
    color: white;
}

.btn-edit {
    background: #e3e6ee;
    color: #23395d;
}

.btn-edit:hover {
    background: #cfd8e3;
    color: #23395d;
}

.btn-delete {
    background: #fff0f0;
    color: #c82333;
}

.btn-delete:hover {
    background: #ffeaea;
    color: #a71d2a;
}

.article-info {
    color: #666;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 0.7rem;
    background: #fff;
    padding: 0.8rem 1.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
}

@media (max-width: 900px) {
    .article-title {
        font-size: 1.5rem;
    }
    .article-meta {
        flex-direction: column;
        gap: 1rem;
    }
    .article-content {
        padding: 1.2rem 0.5rem 0 0.5rem;
    }
    .stats-section {
        flex-direction: column;
        gap: 1rem;
    }
    .action-buttons {
        flex-direction: column;
        align-items: stretch;
    }
    .btn-group {
        justify-content: center;
    }
    .action-btn {
        width: 100%;
        justify-content: center;
    }
    .article-info {
        text-align: center;
        justify-content: center;
    }
}
</style>

<div class="article-page">
    <article class="article-card">
        <header class="article-header">
            <h1 class="article-title">{{ $post->title }}</h1>
            <div class="article-meta">
                <div class="meta-badge">
                    <i class="fas fa-user"></i>
                    <span>{{ $post->user->name }}</span>
                </div>
                <div class="meta-badge">
                    <i class="fas fa-calendar"></i>
                    <span>{{ $post->created_at->format('d M Y') }}</span>
                </div>
                <div class="meta-badge">
                    <i class="fas fa-clock"></i>
                    <span>{{ $post->created_at->format('H:i') }}</span>
                </div>
                <span class="category-badge">
                    <i class="fas fa-tag"></i>
                    {{ $post->category->name }}
                </span>
            </div>
        </header>
        <main class="article-content">
            @if($post->desc)
                <div class="article-lead">
                    "{{ $post->desc }}"
                </div>
            @endif
            <div class="article-text">
                {!! nl2br(e($post->body)) !!}
            </div>
            <section class="stats-section">
                <div class="stat-card">
                    <span class="stat-number">{{ rand(150, 2500) }}</span>
                    <span class="stat-label">Views</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ ceil(str_word_count(strip_tags($post->body)) / 200) }}</span>
                    <span class="stat-label">Min Read</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ rand(5, 25) }}</span>
                    <span class="stat-label">Comments</span>
                </div>
            </section>
            <section class="share-section">
                <h3 class="share-title">Share this article</h3>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" class="share-btn share-facebook" title="Share on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" 
                       target="_blank" class="share-btn share-twitter" title="Share on Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->fullUrl()) }}" 
                       target="_blank" class="share-btn share-whatsapp" title="Share on WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" 
                       target="_blank" class="share-btn share-linkedin" title="Share on LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </section>
        </main>
        <footer class="action-section">
            <div class="action-buttons">
                <a href="{{ route('posts.index') }}" class="action-btn btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Beranda
                </a>
                <div class="btn-group">
                    @auth
                        @if(auth()->user()->role === 'admin' || 
                            (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                            <a href="{{ route('posts.edit', $post->id) }}" class="action-btn btn-edit">
                                <i class="fas fa-edit"></i>
                                Edit Artikel
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus Artikel
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
                <div class="article-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Terakhir diperbarui: {{ $post->updated_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </footer>
    </article>
</div>
@endsection
