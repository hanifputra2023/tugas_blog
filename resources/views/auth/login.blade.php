@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
.login-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #4f8cff 0%, #a1c4fd 60%, #c2e9fb 100%);
    position: relative;
    overflow: hidden;
}

.login-container {
    position: relative;
    z-index: 2;
    padding: 2rem 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-card {
    background: rgba(255,255,255,0.96);
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(60, 80, 120, 0.10);
    border: 1px solid #e3e8ee;
    overflow: hidden;
    transition: box-shadow 0.3s;
}

.login-card:hover {
    box-shadow: 0 16px 48px rgba(60, 80, 120, 0.13);
}

.login-header {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    padding: 2rem 1.5rem 1.2rem;
    text-align: center;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.login-header h3 {
    color: #fff;
    font-weight: 700;
    font-size: 1.6rem;
    margin-bottom: 0.3rem;
}

.login-header p {
    color: rgba(255,255,255,0.85);
    font-size: 1rem;
    margin: 0;
}

.login-body {
    padding: 2rem 1.5rem 1.5rem;
}

.form-group {
    margin-bottom: 1.2rem;
    position: relative;
}

.form-control {
    border: 1.5px solid #dbeafe;
    border-radius: 12px;
    padding: 14px 18px 14px 44px;
    font-size: 1rem;
    background: #f6f8fa;
    transition: border-color 0.2s;
}

.form-control:focus {
    border-color: #4f8cff;
    background: #fff;
}

.input-icon {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #b6c2d6;
    font-size: 1.1rem;
}

.btn-login {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    border: none;
    border-radius: 12px;
    padding: 13px;
    font-weight: 600;
    font-size: 1.08rem;
    color: #fff;
    width: 100%;
    box-shadow: 0 2px 8px rgba(79,140,255,0.08);
    transition: box-shadow 0.2s, transform 0.2s;
}

.btn-login:hover {
    box-shadow: 0 6px 18px rgba(79,140,255,0.13);
    transform: translateY(-2px);
}

.divider {
    margin: 1.5rem 0;
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
    background: #e3e8ee;
}

.divider span {
    background: #fff;
    padding: 0 1rem;
    color: #7b8ca7;
    font-weight: 500;
    font-size: 0.95rem;
}

.register-link {
    text-align: center;
    margin-top: 1.5rem;
}

.register-link a {
    color: #4f8cff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.2s;
}

.register-link a:hover {
    color: #2563eb;
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
