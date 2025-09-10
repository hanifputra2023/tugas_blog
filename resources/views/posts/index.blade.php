@extends('layouts.app')

@section('title', 'Daftar Posts')

@section('content')
<style>
.posts-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 4rem 0 6rem;
    margin: -80px -15px 3rem -15px;
    position: relative;
    overflow: hidden;
}

.posts-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="70" r="1.2" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="30" r="0.8" fill="rgba(255,255,255,0.1)"/></svg>');
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.posts-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
    padding-top: 2rem;
}

.posts-hero h1 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
    text-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

.posts-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 2rem;
}

.posts-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.post-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
    margin-bottom: 2rem;
    position: relative;
}

.post-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff6b6b, #ffd93d, #4ecdc4, #45b7d1, #96ceb4);
}

.post-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.post-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1.5rem;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

.post-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    font-size: 0.9rem;
    color: #6c757d;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.8);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    border: 1px solid rgba(0,0,0,0.1);
}

.post-body {
    padding: 1.5rem;
}

.post-description {
    color: #495057;
    line-height: 1.6;
    font-size: 1rem;
    margin-bottom: 1.5rem;
}

.post-actions {
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
}

.btn-view {
    background: linear-gradient(45deg, #4facfe, #00f2fe);
    color: white;
}

.btn-view:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(79, 172, 254, 0.4);
}

.btn-edit {
    background: linear-gradient(45deg, #ffecd2, #fcb69f);
    color: #8b4513;
}

.btn-edit:hover {
    color: #8b4513;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(252, 182, 159, 0.4);
}

.btn-delete {
    background: linear-gradient(45deg, #ff9a9e, #fecfef);
    color: #8b1538;
}

.btn-delete:hover {
    color: #8b1538;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 154, 158, 0.4);
}

.btn-create {
    background: linear-gradient(45deg, #667eea, #764ba2);
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
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.btn-create:hover {
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
}

.btn-login {
    background: linear-gradient(45deg, #11998e, #38ef7d);
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
}

.btn-login:hover {
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(17, 153, 142, 0.4);
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
    color: #6c757d;
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

.guest-info {
    background: linear-gradient(45deg, #ffeaa7, #fab1a0);
    border: none;
    color: #2d3436;
    border-radius: 15px;
    padding: 1.5rem;
    margin: 1rem 0;
}

@media (max-width: 768px) {
    .posts-hero h1 {
        font-size: 2rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .post-actions {
        flex-direction: column;
    }
    
    .btn-modern {
        justify-content: center;
    }
}
</style>

<div class="posts-hero">
    <div class="container">
        <div class="posts-hero-content">
            <h1><i class="fas fa-newspaper me-3"></i>Blog Posts</h1>
            <p>Temukan artikel menarik dan berbagi pengetahuan</p>
            
            @auth
                @if(in_array(auth()->user()->role, ['admin', 'author']))
                    <a href="{{ route('posts.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Post Baru
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login untuk Menulis
                </a>
            @endauth
        </div>
    </div>
</div>

<div class="posts-container">
    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="post-card">
                <div class="post-header">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="post-meta">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span>{{ $post->user->name }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-tag"></i>
                            <span>{{ $post->category->name }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $post->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="post-body">
                    <p class="post-description">{{ Str::limit($post->desc ?: $post->body, 200) }}</p>
                </div>
                
                <div class="post-actions">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn-modern btn-view">
                        <i class="fas fa-eye"></i>
                        Baca Selengkapnya
                    </a>
                    
                    @auth
                        @if(auth()->user()->role === 'admin' || 
                            (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn-modern btn-edit">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-modern btn-delete" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h3>Belum Ada Post</h3>
            <p>Mulai berbagi cerita dan pengetahuan dengan membuat post pertama Anda!</p>
            
            @auth
                @if(in_array(auth()->user()->role, ['admin', 'author']))
                    <a href="{{ route('posts.create') }}" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Post Pertama
                    </a>
                @else
                    <div class="guest-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Informasi:</strong> Sebagai Guest, Anda hanya bisa membaca post. 
                        Hubungi administrator untuk upgrade ke Author dan mulai menulis.
                    </div>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login untuk Mulai Menulis
                </a>
            @endauth
        </div>
    @endif
</div>
@endsection
