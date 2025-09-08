<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Sederhana')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">📝 Blog Sederhana</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </div>
                
                <div class="navbar-nav ms-auto">
                    @auth
                        <span class="navbar-text me-3">
                            👋 Halo, {{ auth()->user()->name }} 
                            <span class="badge bg-secondary">{{ ucfirst(auth()->user()->role) }}</span>
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">🚪 Logout</button>
                        </form>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">🔐 Login</a>
                        <a class="nav-link" href="{{ route('register') }}">📝 Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
