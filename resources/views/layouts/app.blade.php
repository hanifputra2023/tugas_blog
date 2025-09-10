<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Modern')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        min-height: 100vh;
        margin: 0;
        position: relative;
        overflow-x: hidden;
    }
    
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1.5" fill="rgba(255,255,255,0.03)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.04)"/><circle cx="10" cy="60" r="1.5" fill="rgba(255,255,255,0.02)"/><circle cx="85" cy="35" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        pointer-events: none;
        z-index: 1;
    }
    
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .modern-navbar {
        background: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(25px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1.2rem 0;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        position: relative;
        z-index: 1000;
    }
    
    .modern-navbar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, 
            rgba(255,255,255,0.1) 0%, 
            rgba(255,255,255,0.05) 50%, 
            rgba(255,255,255,0.1) 100%);
        border-radius: 0;
        z-index: -1;
    }
    
    .navbar-brand {
        font-weight: 800;
        font-size: 1.6rem;
        background: linear-gradient(45deg, #ffd700, #ffed4e, #fff59d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        transition: all 0.4s ease;
    }
    
    .navbar-brand i {
        background: linear-gradient(45deg, #ffd700, #ff6b6b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.8rem;
        filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));
    }
    
    .navbar-brand:hover {
        transform: scale(1.08) rotate(2deg);
        filter: drop-shadow(0 0 20px rgba(255, 215, 0, 0.6));
    }
    
    .nav-link {
        color: rgba(255, 255, 255, 0.95) !important;
        font-weight: 600;
        padding: 10px 18px !important;
        border-radius: 25px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin: 0 6px;
        position: relative;
        overflow: hidden;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }
    
    .nav-link:hover::before {
        left: 100%;
    }
    
    .nav-link:hover {
        color: #fff !important;
        background: linear-gradient(45deg, #ff6b6b, #ffd93d, #4facfe);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
    }
    
    .navbar-text {
        color: rgba(255, 255, 255, 0.95) !important;
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    
    .badge {
        background: linear-gradient(45deg, #ff6b6b, #ffd93d) !important;
        color: #fff !important;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .btn-outline-light {
        border: 2px solid rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-weight: 700;
        border-radius: 25px;
        padding: 8px 20px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        position: relative;
        overflow: hidden;
    }
    
    .btn-outline-light::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #ff6b6b, #ffd93d);
        transition: left 0.4s;
        z-index: -1;
    }
    
    .btn-outline-light:hover::before {
        left: 0;
    }
    
    .btn-outline-light:hover {
        background: transparent;
        border-color: rgba(255, 255, 255, 0.6);
        color: #ffffff;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 30px rgba(255, 107, 107, 0.4);
    }
    
    .main-content {
        min-height: calc(100vh - 90px);
        padding: 0;
        position: relative;
        z-index: 2;
    }
    
    .alert-success {
        background: linear-gradient(45deg, #4facfe, #00f2fe, #43e97b);
        border: none;
        color: #ffffff;
        border-radius: 20px;
        padding: 1.2rem 2rem;
        margin: 1.5rem auto;
        max-width: 900px;
        box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
        font-weight: 600;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        position: relative;
        overflow: hidden;
    }
    
    .alert-success::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        animation: shimmer 2s infinite;
    }
    
    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }
    
    .alert-success .btn-close {
        filter: brightness(0) invert(1);
        opacity: 0.8;
        transition: all 0.3s ease;
    }
    
    .alert-success .btn-close:hover {
        opacity: 1;
        transform: scale(1.2);
    }
    
    .navbar-toggler {
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 8px 12px;
        transition: all 0.3s ease;
    }
    
    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3);
        border-color: #ffd700;
    }
    
    .navbar-toggler:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.05);
    }
    
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.95%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='3' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        transition: all 0.3s ease;
    }
    
    .navbar-collapse {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        margin-top: 10px;
        padding: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.4rem;
        }
        
        .nav-link {
            padding: 15px 20px !important;
            margin: 3px 0;
            border-radius: 15px;
        }
        
        .btn-outline-light {
            width: 100%;
            margin-top: 10px;
        }
        
        .navbar-text {
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            margin-bottom: 10px;
        }
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #ff6b6b, #ffd93d);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #ffd93d, #4facfe);
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg modern-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <i class="fas fa-blog"></i>
                Blog Modern
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="{{ route('posts.index') }}">
                        <i class="fas fa-newspaper me-1"></i>Posts
                    </a>
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="fas fa-tags me-1"></i>Categories
                    </a>
                </div>
                
                <div class="navbar-nav ms-auto">
                    @auth
                        <span class="navbar-text me-3">
                            <i class="fas fa-user-circle me-1"></i>{{ auth()->user()->name }} 
                            <span class="badge">{{ ucfirst(auth()->user()->role) }}</span>
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="main-content" style="padding-top: 80px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
