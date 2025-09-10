@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress" id="reading-progress"></div>
<style>
/* Modern Article View - Consistent with Portal Design */
.article-header {
    background: #1a365d;
    color: white;
    padding: 3rem 0;
    margin: -80px -15px 0 -15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.article-breadcrumb {
    background: #ffffff;
    border-bottom: 3px solid #e53e3e;
    padding: 1rem 0;
    margin: 0 -15px 2rem -15px;
    font-size: 0.9rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.breadcrumb {
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin: 0;
    font-weight: 500;
}

.breadcrumb a {
    color: #1a365d;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
}

.breadcrumb a:hover {
    color: #e53e3e;
    background: rgba(229, 62, 62, 0.1);
    transform: translateY(-1px);
}

.breadcrumb span {
    color: #9ca3af;
    font-weight: 400;
}

.article-container {
    max-width: 850px;
    margin: 0 auto;
    padding: 0 1rem;
    background: white;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    overflow: hidden;
    margin-top: -1rem;
    position: relative;
    z-index: 10;
}

.article-header-content {
    max-width: 850px;
    margin: 0 auto;
    padding: 0 1rem;
    position: relative;
    z-index: 2;
}

.article-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    line-height: 1.1;
    margin-bottom: 2rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    color: rgba(255, 255, 255, 0.95);
    font-size: 1rem;
    animation: fadeInUp 0.8s ease-out 0.2s both;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255, 255, 255, 0.15);
    padding: 0.75rem 1.25rem;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    font-weight: 500;
}

.meta-item:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.meta-item i {
    font-size: 1.1rem;
    opacity: 0.9;
}

.category-badge {
    background: #e53e3e;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: 0 4px 8px rgba(229, 62, 62, 0.3);
    transition: all 0.3s ease;
    animation: fadeInUp 0.8s ease-out 0.4s both;
}

.category-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(229, 62, 62, 0.4);
}

.article-content {
    background: white;
    padding: 4rem 3rem;
    line-height: 1.8;
    font-size: 1.15rem;
    color: #374151;
    position: relative;
}

.article-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #e53e3e;
}

.article-lead {
    font-size: 1.4rem;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 2.5rem;
    padding: 2rem;
    background: #f8fafc;
    border-left: 5px solid #1a365d;
    border-radius: 0 12px 12px 0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.article-lead::before {
    content: '"';
    position: absolute;
    top: -10px;
    left: 10px;
    font-size: 4rem;
    color: #1a365d;
    opacity: 0.2;
    font-family: serif;
}

.article-body {
    margin-top: 2.5rem;
}

.article-body p {
    margin-bottom: 1.8rem;
    text-align: justify;
    color: #374151;
    line-height: 1.9;
}

.article-body p:first-child::first-letter {
    font-size: 4rem;
    font-weight: 800;
    float: left;
    line-height: 0.8;
    margin: 0.2rem 0.8rem 0.1rem 0;
    color: #1a365d;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    font-family: serif;
}

.article-actions {
    background: #ffffff;
    border-top: 3px solid #e53e3e;
    padding: 2.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    position: relative;
}

.btn-news {
    padding: 1rem 2rem;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-news:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.2);
}

.btn-back {
    background: #1a365d;
    color: white;
    border: 2px solid transparent;
}

.btn-back:hover {
    background: #2d3748;
    color: white;
    text-decoration: none;
}

.btn-edit {
    background: #f59e0b;
    color: white;
    border: 2px solid transparent;
}

.btn-edit:hover {
    background: #d97706;
    color: white;
    text-decoration: none;
}

.btn-delete {
    background: #e53e3e;
    color: white;
    border: 2px solid transparent;
}

.btn-delete:hover {
    background: #c53030;
    color: white;
}

.article-info {
    color: #6b7280;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(107, 114, 128, 0.1);
    padding: 0.75rem 1rem;
    border-radius: 8px;
    font-weight: 500;
}

.article-info i {
    color: #1a365d;
}

.reading-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 4px;
    background: #e53e3e;
    z-index: 1000;
    transition: width 0.3s ease;
}

.share-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
    align-items: center;
}

.share-btn {
    padding: 0.75rem;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    font-size: 1.2rem;
}

.share-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

.share-facebook { background: #1877f2; }
.share-twitter { background: #1da1f2; }
.share-whatsapp { background: #25d366; }
.share-linkedin { background: #0077b5; }

.article-stats {
    display: flex;
    gap: 2rem;
    margin-top: 1.5rem;
    padding: 1.5rem;
    background: rgba(26, 54, 93, 0.05);
    border-radius: 8px;
    border: 1px solid rgba(26, 54, 93, 0.1);
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #1a365d;
    font-weight: 600;
}

.stat-item i {
    font-size: 1.1rem;
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
        font-size: 2.2rem;
        line-height: 1.2;
    }
    
    .article-meta {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .meta-item {
        justify-content: center;
        text-align: center;
    }
    
    .article-content {
        padding: 2.5rem 1.5rem;
        font-size: 1.05rem;
    }
    
    .article-lead {
        font-size: 1.2rem;
        padding: 1.5rem;
    }
    
    .article-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 1.5rem;
        padding: 2rem 1.5rem;
    }
    
    .btn-news {
        justify-content: center;
        width: 100%;
        padding: 1.25rem;
        font-size: 1.05rem;
    }
    
    .article-body p:first-child::first-letter {
        font-size: 3rem;
        margin: 0.1rem 0.6rem 0 0;
    }
    
    .share-buttons {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .article-stats {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .article-container {
        margin: 0 0.5rem;
        margin-top: -1rem;
    }
    
    .article-header {
        padding: 2rem 0;
    }
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

/* Animation for content loading */
.article-container {
    animation: fadeIn 1s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Print styles */
@media print {
    .article-actions,
    .article-breadcrumb,
    .share-buttons {
        display: none !important;
    }
    
    .article-header {
        background: #1e3a8a !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
    }
    
    .article-content {
        padding: 1rem !important;
        box-shadow: none !important;
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
        
        <!-- Article Statistics -->
        <div class="article-stats">
            <div class="stat-item">
                <i class="fas fa-eye"></i>
                <span>{{ rand(150, 2500) }} views</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-clock"></i>
                <span>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-comment"></i>
                <span>{{ rand(5, 25) }} comments</span>
            </div>
        </div>
        
        <!-- Social Share Buttons -->
        <div class="share-buttons">
            <strong style="color: #374151;">Share this article:</strong>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Reading Progress Bar
    const progressBar = document.getElementById('reading-progress');
    const articleContent = document.querySelector('.article-content');
    
    if (progressBar && articleContent) {
        window.addEventListener('scroll', function() {
            const articleTop = articleContent.offsetTop;
            const articleHeight = articleContent.offsetHeight;
            const windowHeight = window.innerHeight;
            const scrollTop = window.pageYOffset;
            
            const articleStart = articleTop - windowHeight;
            const articleEnd = articleTop + articleHeight;
            
            if (scrollTop >= articleStart && scrollTop <= articleEnd) {
                const progress = ((scrollTop - articleStart) / (articleEnd - articleStart)) * 100;
                progressBar.style.width = Math.min(progress, 100) + '%';
            } else if (scrollTop < articleStart) {
                progressBar.style.width = '0%';
            } else {
                progressBar.style.width = '100%';
            }
        });
    }
    
    // Smooth scroll for back to top
    const backButton = document.querySelector('.btn-back');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            if (this.getAttribute('href').includes('#')) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }
    
    // Add animation to social share buttons
    const shareButtons = document.querySelectorAll('.share-btn');
    shareButtons.forEach((btn, index) => {
        btn.style.animationDelay = (index * 0.1) + 's';
        btn.classList.add('animate-in');
    });
    
    // Copy URL functionality
    function copyToClipboard() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            // Show success message
            const tooltip = document.createElement('div');
            tooltip.textContent = 'URL copied to clipboard!';
            tooltip.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #10b981;
                color: white;
                padding: 0.75rem 1rem;
                border-radius: 8px;
                font-weight: 600;
                z-index: 9999;
                animation: slideIn 0.3s ease;
            `;
            document.body.appendChild(tooltip);
            
            setTimeout(() => {
                tooltip.remove();
            }, 3000);
        });
    }
    
    // Add copy URL button
    const shareContainer = document.querySelector('.share-buttons');
    if (shareContainer) {
        const copyBtn = document.createElement('button');
        copyBtn.innerHTML = '<i class="fas fa-link"></i>';
        copyBtn.className = 'share-btn';
        copyBtn.style.background = '#6b7280';
        copyBtn.title = 'Copy URL';
        copyBtn.onclick = copyToClipboard;
        shareContainer.appendChild(copyBtn);
    }
});

// Add CSS animation class
const style = document.createElement('style');
style.textContent = `
    .animate-in {
        animation: bounceIn 0.6s ease forwards;
        opacity: 0;
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3) translateY(20px);
        }
        50% {
            opacity: 1;
            transform: scale(1.05) translateY(-5px);
        }
        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
`;
document.head.appendChild(style);
</script>

@endsection
