@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
.login-page {
    min-height: 100vh;
    background: linear-gradient(45deg, #1e3c72 0%, #2a5298 50%, #4facfe 100%);
    position: relative;
    overflow: hidden;
}

.login-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="30" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="80" r="0.8" fill="rgba(255,255,255,0.1)"/></svg>');
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.login-container {
    position: relative;
    z-index: 2;
    padding: 2rem 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.login-card:hover {
    transform: translateY(-5px);
}

.login-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 3rem 2rem 2rem;
    text-align: center;
    position: relative;
}

.login-header::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 4px;
    background: #fff;
    border-radius: 2px;
    opacity: 0.7;
}

.login-header h3 {
    color: white;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1.8rem;
}

.login-header p {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 1rem;
}

.login-body {
    padding: 2.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.form-control {
    border: 2px solid #e8ecf0;
    border-radius: 12px;
    padding: 15px 20px 15px 50px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fb;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    background: white;
}

.form-control::placeholder {
    color: #9ca3af;
    font-weight: 400;
}

.input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.1rem;
}

.form-control:focus + .input-icon {
    color: #667eea;
}

.btn-login {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 12px;
    padding: 15px;
    font-weight: 600;
    font-size: 1.1rem;
    color: white;
    width: 100%;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-login:hover::before {
    left: 100%;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
}

.divider {
    margin: 2rem 0;
    text-align: center;
    position: relative;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e8ecf0;
}

.divider span {
    background: white;
    padding: 0 1.5rem;
    color: #6b7280;
    font-weight: 500;
    font-size: 0.9rem;
}

.register-link {
    text-align: center;
    margin-top: 2rem;
}

.register-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
}

.register-link a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #667eea;
    transition: width 0.3s ease;
}

.register-link a:hover::after {
    width: 100%;
}

.demo-accounts {
    background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 100%);
    border: 1px solid #c7d2fe;
    border-radius: 16px;
    padding: 1.5rem;
    margin-top: 2rem;
}

.demo-title {
    color: #4338ca;
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.demo-item {
    background: white;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 8px;
    border: 1px solid #e5e7eb;
    transition: all 0.2s ease;
    cursor: pointer;
}

.demo-item:hover {
    border-color: #667eea;
    transform: translateX(3px);
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.1);
}

.demo-item:last-child {
    margin-bottom: 0;
}

.demo-role {
    color: #374151;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 2px;
}

.demo-credentials {
    color: #6b7280;
    font-size: 0.8rem;
    font-family: 'Courier New', monospace;
}

.invalid-feedback {
    display: block;
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 5px;
}
</style>

<div class="login-page">
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="login-card">
                        <div class="login-header">
                            <h3>Selamat Datang</h3>
                            <p>Masuk ke akun Anda untuk melanjutkan</p>
                        </div>
                        
                        <div class="login-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="Masukkan email Anda"
                                           required 
                                           autocomplete="email" 
                                           autofocus>
                                    <i class="input-icon fas fa-envelope"></i>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           name="password" 
                                           placeholder="Masukkan password Anda"
                                           required 
                                           autocomplete="current-password">
                                    <i class="input-icon fas fa-lock"></i>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-login">
                                    Masuk
                                </button>
                            </form>

                            <div class="divider">
                                <span>atau</span>
                            </div>
                            
                            <div class="register-link">
                                <p class="mb-0">Belum memiliki akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                            </div>

                            <div class="demo-accounts">
                                <div class="demo-title">
                                    <i class="fas fa-users"></i>
                                    Akun Demo
                                </div>
                                
                                <div class="demo-item" onclick="fillCredentials('admin@blog.com', 'password')">
                                    <div class="demo-role">Administrator</div>
                                    <div class="demo-credentials">admin@blog.com / password</div>
                                </div>
                                
                                <div class="demo-item" onclick="fillCredentials('author@blog.com', 'password')">
                                    <div class="demo-role">Author</div>
                                    <div class="demo-credentials">author@blog.com / password</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function fillCredentials(email, password) {
    document.querySelector('input[name="email"]').value = email;
    document.querySelector('input[name="password"]').value = password;
}
</script>
@endsection
