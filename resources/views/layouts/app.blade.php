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
        background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
        min-height: 100vh;
        margin: 0;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        display: none;
    }

    .modern-navbar {
        background: #ffffff !important;
        border-bottom: 1px solid #e3e6ee;
        padding: 1rem 0;
        box-shadow: 0 4px 24px rgba(60, 80, 120, 0.08);
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .modern-navbar::before {
        display: none;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.4rem;
        color: #23395d;
        background: none;
        text-shadow: none;
        transition: color 0.3s;
    }

    .navbar-brand i {
        color: #4f8cff;
        background: none;
        font-size: 1.6rem;
        filter: none;
    }

    .navbar-brand:hover {
        color: #2563eb;
        transform: scale(1.04);
        filter: none;
    }

    .nav-link {
        color: #23395d !important;
        font-weight: 500;
        padding: 8px 16px !important;
        border-radius: 18px;
        transition: background 0.3s, color 0.3s;
        margin: 0 4px;
        background: none;
        text-shadow: none;
    }

    .nav-link:hover {
        color: #4f8cff !important;
        background: #e3e6ee;
        transform: none;
        box-shadow: none;
    }

    .navbar-text {
        color: #23395d !important;
        font-weight: 500;
        text-shadow: none;
    }

    .badge {
        background: #4f8cff !important;
        color: #fff !important;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 12px;
        box-shadow: none;
        text-shadow: none;
        animation: none;
    }

    .btn-outline-light {
        border: 1.5px solid #4f8cff;
        background: #f5f6fa;
        color: #4f8cff;
        font-weight: 600;
        border-radius: 18px;
        padding: 7px 18px;
        transition: background 0.3s, color 0.3s, border 0.3s;
        text-shadow: none;
    }

    .btn-outline-light:hover {
        background: #4f8cff;
        border-color: #2563eb;
        color: #fff;
        transform: none;
        box-shadow: 0 2px 8px rgba(79,140,255,0.10);
    }

    .main-content {
        min-height: calc(100vh - 80px);
        padding: 0;
        position: relative;
        z-index: 2;
    }

    .alert-success {
        background: #e0eafc;
        border: none;
        color: #23395d;
        border-radius: 16px;
        padding: 1rem 1.5rem;
        margin: 1.2rem auto;
        max-width: 900px;
        box-shadow: 0 2px 8px rgba(79,140,255,0.07);
        font-weight: 500;
        text-shadow: none;
        position: relative;
        overflow: hidden;
    }

    .alert-success .btn-close {
        filter: none;
        opacity: 0.7;
        transition: opacity 0.3s;
    }

    .alert-success .btn-close:hover {
        opacity: 1;
        transform: none;
    }

    .navbar-toggler {
        border: 1.5px solid #e3e6ee;
        border-radius: 12px;
        padding: 7px 10px;
        transition: border 0.3s;
    }

    .navbar-toggler:focus {
        box-shadow: 0 0 0 2px #4f8cff33;
        border-color: #4f8cff;
    }

    .navbar-toggler:hover {
        background: #e3e6ee;
        transform: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%234f8cff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='3' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        transition: none;
    }

    .navbar-collapse {
        background: #f5f6fa;
        border-radius: 12px;
        margin-top: 8px;
        padding: 12px;
        border: 1px solid #e3e6ee;
    }

    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.2rem;
        }
        .nav-link {
            padding: 12px 16px !important;
            margin: 2px 0;
            border-radius: 12px;
        }
        .btn-outline-light {
            width: 100%;
            margin-top: 8px;
        }
        .navbar-text {
            padding: 8px 0;
            border-bottom: 1px solid #e3e6ee;
            margin-bottom: 8px;
        }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f5f6fa;
    }
    ::-webkit-scrollbar-thumb {
        background: #4f8cff;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #2563eb;
    }
    </style>
</head>
<body>
    @if (!Request::is('login') && !Request::is('register'))
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
    @endif

    <div class="main-content" style="padding-top: @if(Request::is('login') || Request::is('register')) 0px @else 80px @endif;">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
