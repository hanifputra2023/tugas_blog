@extends('layouts.app')

@section('title', $post->title)

@section('content')
<style>
.post-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
    background-size: 400% 400%;
    animation: gradientFlow 20s ease infinite;
    padding: 5rem 0 7rem;
    margin: -90px -15px 4rem -15px;
    position: relative;
    overflow: hidden;
}

@keyframes gradientFlow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.post-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="stars" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="25" cy="15" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="35" cy="25" r="1" fill="rgba(255,255,255,0.12)"/><circle cx="15" cy="35" r="1.2" fill="rgba(255,255,255,0.09)"/></pattern></defs><rect width="200" height="200" fill="url(%23stars)"/></svg>');
    animation: starFloat 40s ease-in-out infinite;
    opacity: 0.7;
}

@keyframes starFloat {
    0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
    25% { transform: translateY(-15px) translateX(10px) rotate(90deg); }
    50% { transform: translateY(-30px) translateX(-5px) rotate(180deg); }
    75% { transform: translateY(-10px) translateX(-15px) rotate(270deg); }
}

.post-hero::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    height: 60px;
    background: linear-gradient(180deg, transparent 0%, rgba(255,255,255,0.1) 50%, rgba(255,255,255,0.8) 100%);
    z-index: 1;
}

.post-hero-content {
    position: relative;
    z-index: 2;
    color: white;
    padding-top: 3rem;
}

.post-title {
    font-size: 3rem;
    font-weight: 900;
    margin-bottom: 2rem;
    text-shadow: 0 6px 12px rgba(0,0,0,0.4);
    line-height: 1.1;
    background: linear-gradient(45deg, #ffffff, #f8f9fa, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));
}

.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-bottom: 2.5rem;
    animation: slideInUp 0.8s ease-out 0.3s both;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.meta-item {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(15px);
    border: 2px solid rgba(255, 255, 255, 0.4);
    padding: 0.8rem 1.5rem;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
}

.meta-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s;
}

.meta-item:hover::before {
    left: 100%;
}

.meta-item:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.6);
}

.meta-item i {
    font-size: 1.2rem;
    filter: drop-shadow(1px 1px 2px rgba(0,0,0,0.3));
}

.post-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    animation: slideInUp 0.8s ease-out 0.6s both;
}

.post-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 1rem;
    animation: fadeInUp 1s ease-out 0.2s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.post-card {
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(25px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.15),
        0 10px 20px rgba(0, 0, 0, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    margin-bottom: 3rem;
    position: relative;
}

.post-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c, #4facfe);
    background-size: 300% 100%;
    animation: shimmerTop 3s ease-in-out infinite;
}

@keyframes shimmerTop {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.post-description-section {
    background: linear-gradient(135deg, #e8f4f8 0%, #d1ecf1 50%, #bee5eb 100%);
    padding: 2.5rem;
    border-bottom: 2px solid rgba(102, 126, 234, 0.1);
    position: relative;
    overflow: hidden;
}

.post-description-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #4facfe, #00f2fe, #43e97b);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scaleX(1); }
    50% { opacity: 0.7; transform: scaleX(1.05); }
}

.post-description-section::after {
    content: '';
    position: absolute;
    top: 20px;
    right: 20px;
    width: 100px;
    height: 100px;
    background: linear-gradient(45deg, rgba(79, 172, 254, 0.1), rgba(67, 233, 123, 0.1));
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.description-title {
    color: #0d47a1;
    font-weight: 800;
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
    text-shadow: 1px 1px 2px rgba(13, 71, 161, 0.2);
}

.description-title i {
    font-size: 1.5rem;
    color: #1976d2;
    filter: drop-shadow(2px 2px 4px rgba(25, 118, 210, 0.3));
}

.description-text {
    color: #1565c0;
    font-size: 1.2rem;
    line-height: 1.7;
    font-style: italic;
    font-weight: 500;
    text-shadow: 1px 1px 2px rgba(21, 101, 192, 0.1);
    position: relative;
    padding-left: 1.5rem;
}

.description-text::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #4facfe, #00f2fe);
    border-radius: 2px;
}

.post-content {
    padding: 3.5rem;
    line-height: 1.9;
    font-size: 1.2rem;
    color: #2c3e50;
    position: relative;
    background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
}

.post-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(102,126,234,0.03)"/></pattern></defs><rect width="60" height="60" fill="url(%23dots)"/></svg>');
    pointer-events: none;
}

.post-content p {
    margin-bottom: 2rem;
    text-align: justify;
    text-indent: 2rem;
    position: relative;
    z-index: 1;
    font-weight: 400;
    text-shadow: 0 1px 2px rgba(44, 62, 80, 0.1);
}

.post-content p:first-child {
    font-size: 1.3rem;
    font-weight: 500;
    color: #34495e;
    text-indent: 0;
    position: relative;
    padding-left: 2rem;
}

.post-content p:first-child::before {
    content: '"';
    position: absolute;
    left: 0;
    top: -10px;
    font-size: 4rem;
    color: #667eea;
    font-family: Georgia, serif;
    line-height: 1;
    opacity: 0.7;
}

.post-footer {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 75%, #f5576c 100%);
    padding: 2.5rem;
    border-top: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    position: relative;
    overflow: hidden;
}

.post-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="waves" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M0 25 Q12.5 10 25 25 T50 25" stroke="rgba(255,255,255,0.1)" stroke-width="2" fill="none"/></pattern></defs><rect width="100" height="100" fill="url(%23waves)"/></svg>');
    animation: waveMove 15s linear infinite;
}

@keyframes waveMove {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50px); }
}

.post-footer * {
    position: relative;
    z-index: 2;
}

.btn-modern {
    border: none;
    border-radius: 20px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1.1rem;
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

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s;
}

.btn-modern:hover::before {
    left: 100%;
}

.btn-modern i {
    transition: transform 0.3s ease;
}

.btn-modern:hover i {
    transform: scale(1.2) rotate(360deg);
}

.btn-back {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-back:hover {
    color: white;
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
}

.btn-edit {
    background: linear-gradient(45deg, #ffd89b, #19547b);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-edit:hover {
    color: white;
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 216, 155, 0.4);
}

.btn-delete {
    background: linear-gradient(45deg, #ff6b6b, #feca57);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-delete:hover {
    color: white;
    transform: translateY(-4px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 107, 107, 0.4);
}

.category-badge {
    background: linear-gradient(45deg, #667eea, #764ba2, #f093fb);
    background-size: 200% 100%;
    animation: gradientSlide 3s ease-in-out infinite;
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    font-weight: 700;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

@keyframes gradientSlide {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.footer-info {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 0.8rem 1.5rem;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

@keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
    25% { transform: translateY(-10px) translateX(5px) rotate(90deg); }
    50% { transform: translateY(-15px) translateX(-3px) rotate(180deg); }
    75% { transform: translateY(-5px) translateX(-8px) rotate(270deg); }
}

@media (max-width: 768px) {
    .post-hero {
        padding: 3rem 0 5rem;
        margin: -90px -15px 2rem -15px;
    }
    
    .post-title {
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .meta-item {
        justify-content: center;
        width: 100%;
    }
    
    .post-actions {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-modern {
        width: 100%;
        justify-content: center;
        padding: 1.2rem;
        font-size: 1rem;
    }
    
    .post-content {
        padding: 2.5rem 1.5rem;
        font-size: 1.1rem;
    }
    
    .post-content p:first-child {
        font-size: 1.2rem;
        padding-left: 1.5rem;
    }
    
    .post-content p:first-child::before {
        font-size: 3rem;
        top: -8px;
    }
    
    .post-footer {
        flex-direction: column;
        align-items: stretch;
        gap: 1.5rem;
        text-align: center;
    }
    
    .footer-info {
        justify-content: center;
        text-align: center;
    }
    
    .post-description-section {
        padding: 2rem 1.5rem;
    }
    
    .description-title {
        font-size: 1.2rem;
    }
    
    .description-text {
        font-size: 1.1rem;
    }
}

/* Enhanced scrollbar for content area */
.post-content::-webkit-scrollbar {
    width: 6px;
}

.post-content::-webkit-scrollbar-track {
    background: rgba(102, 126, 234, 0.1);
    border-radius: 3px;
}

.post-content::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 3px;
}

.post-content::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(45deg, #764ba2, #f093fb);
}

/* Additional loading animation */
.post-card {
    animation: cardSlideIn 1.2s ease-out 0.4s both;
}

@keyframes cardSlideIn {
    from {
        opacity: 0;
        transform: translateY(80px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>

<div class="post-hero">
    <div class="container">
        <div class="post-hero-content">
            <h1 class="post-title">{{ $post->title }}</h1>
            
            <div class="post-meta">
                <div class="meta-item">
                    <i class="fas fa-user"></i>
                    <span>{{ $post->user->name }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>{{ $post->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="meta-item category-badge">
                    <i class="fas fa-tag"></i>
                    <span>{{ $post->category->name }}</span>
                </div>
            </div>
            
            @auth
                @if(auth()->user()->role === 'admin' || 
                    (auth()->user()->role === 'author' && $post->user_id === auth()->user()->id))
                    <div class="post-actions">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn-modern btn-edit">
                            <i class="fas fa-edit"></i>
                            Edit Post
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-modern btn-delete" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                <i class="fas fa-trash"></i>
                                Hapus Post
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>

<div class="post-container">
    <div class="post-card">
        @if($post->desc)
            <div class="post-description-section">
                <h3 class="description-title">
                    <i class="fas fa-quote-left"></i>
                    Ringkasan
                </h3>
                <p class="description-text">{{ $post->desc }}</p>
            </div>
        @endif
        
        <div class="post-content">
            {!! nl2br(e($post->body)) !!}
        </div>
        
        <div class="post-footer">
            <a href="{{ route('posts.index') }}" class="btn-modern btn-back">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Post
            </a>
            
            <div class="d-flex align-items-center gap-2">
                <div class="footer-info">
                    <i class="fas fa-clock me-1"></i>
                    <span>Terakhir diperbarui: {{ $post->updated_at->format('d M Y, H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
