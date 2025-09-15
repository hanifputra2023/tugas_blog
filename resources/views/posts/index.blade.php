@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')
<style>
body {
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.posts-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #4f8cff 0%, #a1c4fd 60%, #c2e9fb 100%);
    position: relative;
    overflow: hidden;
}

.posts-hero {
    background: linear-gradient(120deg, rgba(79,140,255,0.95) 0%, rgba(109,213,237,0.95) 100%);
    color: #fff;
    padding: 3rem 0 4rem;
    margin: -80px -15px 2rem -15px;
    text-align: center;
    border-radius: 0 0 32px 32px;
    box-shadow: 0 12px 40px rgba(79,140,255,0.13);
    backdrop-filter: blur(6px);
}

.posts-hero h1 {
    font-size: 2.7rem;
    font-weight: 900;
    margin-bottom: 1rem;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.posts-hero p {
    font-size: 1.15rem;
    opacity: 0.97;
    margin-bottom: 2rem;
}

.posts-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
    margin-top: 2rem;
}

.post-card {
    background: rgba(255,255,255,0.85);
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    border: 1.5px solid #e3e8ee;
    padding: 2.2rem 1.7rem 1.5rem 1.7rem;
    transition: box-shadow 0.3s, transform 0.2s;
    display: flex;
    flex-direction: column;
    backdrop-filter: blur(3px);
    position: relative;
    overflow: hidden;
}

.post-card::before {
    content: '';
    position: absolute;
    top: -40px; left: -40px;
    width: 120px; height: 120px;
    background: linear-gradient(135deg, #4f8cff33 0%, #6dd5ed33 100%);
    border-radius: 50%;
    z-index: 0;
    filter: blur(12px);
}

.post-card:hover {
    box-shadow: 0 20px 56px rgba(60, 80, 120, 0.18);
    transform: translateY(-4px) scale(1.02);
}

.post-header {
    background: rgba(248,250,252,0.92);
    padding: 1.7rem 1rem 1.2rem 1rem;
    text-align: center;
    border-radius: 18px 18px 0 0;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
    position: relative;
    z-index: 1;
}

.post-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: #23395d;
    margin-bottom: 0.5rem;
    letter-spacing: 0.5px;
}

.post-meta {
    color: #495057;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    opacity: 0.85;
}

.post-category {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    color: #23395d;
    padding: 0.35rem 1rem;
    border-radius: 14px;
    font-size: 0.95rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    box-shadow: 0 1px 4px rgba(79,140,255,0.06);
}

.post-body {
    padding: 1.2rem 1.5rem;
    flex: 1;
    color: #495057;
    font-size: 1.05rem;
    line-height: 1.7;
    margin-bottom: 1.2rem;
    min-height: 2.5rem;
    z-index: 1;
}

.post-actions {
    background: rgba(248,250,252,0.95);
    padding: 1rem 1.2rem;
    border-top: 1.5px solid #e3e6ee;
    display: flex;
    gap: 0.7rem;
    flex-wrap: wrap;
    border-radius: 0 0 18px 18px;
    box-shadow: 0 1px 4px rgba(79,140,255,0.05);
    z-index: 1;
}

.btn-modern {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    color: #fff;
    border: none;
    border-radius: 14px;
    padding: 12px 26px;
    font-weight: 700;
    font-size: 1.05rem;
    box-shadow: 0 2px 12px rgba(79,140,255,0.10);
    transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    position: relative;
    overflow: hidden;
}

.btn-modern::after {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(120deg, #6dd5ed33 0%, #4f8cff33 100%);
    opacity: 0;
    transition: opacity 0.2s;
    z-index: 0;
}

.btn-modern:hover {
    box-shadow: 0 8px 24px rgba(79,140,255,0.18);
    transform: translateY(-2px) scale(1.04);
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
}

.btn-modern:hover::after {
    opacity: 0.12;
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
    padding: 1.1rem 2.2rem;
    font-weight: 900;
    font-size: 1.15rem;
    transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.7rem;
    box-shadow: 0 6px 24px rgba(79,140,255,0.16);
    position: relative;
    overflow: hidden;
}

.btn-create::after {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(120deg, #6dd5ed33 0%, #4f8cff33 100%);
    opacity: 0;
    transition: opacity 0.2s;
    z-index: 0;
}

.btn-create:hover {
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
    color: #fff;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 12px 40px rgba(79,140,255,0.22);
}

.btn-create:hover::after {
    opacity: 0.13;
}

.empty-state {
    text-align: center;
    padding: 3.5rem 2.5rem;
    background: rgba(255,255,255,0.92);
    border-radius: 18px;
    margin: 2.5rem auto;
    max-width: 520px;
    border: 1.5px solid #e3e6ee;
    box-shadow: 0 4px 16px rgba(79,140,255,0.10);
    backdrop-filter: blur(2px);
}

.empty-state-icon {
    font-size: 3.2rem;
    color: #4f8cff;
    margin-bottom: 1.2rem;
}

.empty-state h3 {
    color: #23395d;
    font-weight: 800;
    margin-bottom: 1.2rem;
}

.empty-state p {
    color: #6c757d;
    margin-bottom: 2.2rem;
}

@media (max-width: 900px) {
    .posts-hero h1 {
        font-size: 1.7rem;
    }
    .posts-grid {
        grid-template-columns: 1fr;
        gap: 1.2rem;
    }
    .post-actions {
        flex-direction: column;
    }
}
</style>

<div class="posts-hero">
    <div class="container">
        <div class="posts-hero-content">
            <h1><i class="fas fa-newspaper me-3"></i>Daftar Artikel</h1>
            <p>Temukan berbagai artikel terbaru dan terpopuler di blog ini</p>
            @auth
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
                    <a href="{{ route('posts.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Artikel Baru
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="posts-container">
    @if($posts->count() > 0)
        <div class="posts-grid">
            @foreach($posts as $post)
                <div class="post-card">
                    <div class="post-header">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <div class="post-meta">
                            <i class="fas fa-user"></i> {{ $post->user->name }} &bull; <i class="fas fa-calendar"></i> {{ $post->created_at->format('d M Y') }}
                        </div>
                        <div class="post-category">
                            <i class="fas fa-tag"></i> {{ $post->category->name }}
                        </div>
                    </div>
                    <div class="post-body">
                        {{ Str::limit(strip_tags($post->body), 120) }}
                    </div>
                    <div class="post-actions">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn-modern">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>
                        @auth
                            @if(auth()->user()->role === 'admin' || (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn-modern btn-edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" style="flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-modern btn-delete w-100" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
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
                <i class="fas fa-newspaper"></i>
            </div>
            <h3>Belum Ada Artikel</h3>
            <p>Mulai menulis artikel pertama untuk mengisi blog Anda!</p>
            @auth
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
                    <a href="{{ route('posts.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Artikel Pertama
                    </a>
                @endif
            @endauth
        </div>
    @endif
</div>
@endsection
