@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
.login-container {
    min-height: 80vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
}

.login-card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
}

.login-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px 20px 0 0;
    padding: 2rem 1.5rem;
    text-align: center;
    border: none;
}

.login-header h4 {
    color: white;
    font-weight: 600;
    margin: 0;
    font-size: 1.5rem;
}

.login-body {
    padding: 2.5rem;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating input {
    border-radius: 15px;
    border: 2px solid #e9ecef;
    padding: 1rem 0.75rem;
    transition: all 0.3s ease;
}

.form-floating input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.form-floating label {
    color: #6c757d;
    font-weight: 500;
}

.btn-login {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 15px;
    padding: 1rem;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.divider {
    margin: 2rem 0;
    position: relative;
    text-align: center;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e9ecef;
}

.divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-weight: 500;
}

.register-link {
    text-align: center;
    margin-bottom: 1.5rem;
}

.register-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.register-link a:hover {
    color: #764ba2;
    text-decoration: underline;
}

.test-accounts {
    background: linear-gradient(135deg, #f8f9ff 0%, #e3e7ff 100%);
    border: 2px solid #e3e7ff;
    border-radius: 15px;
    padding: 1.5rem;
}

.test-accounts h6 {
    color: #667eea;
    font-weight: 600;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.account-item {
    background: white;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    margin-bottom: 0.5rem;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.account-item:hover {
    border-color: #667eea;
    transform: translateX(5px);
}

.account-item:last-child {
    margin-bottom: 0;
}

.account-label {
    color: #667eea;
    font-weight: 600;
    font-size: 0.9rem;
}

.account-credentials {
    color: #6c757d;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}
</style>

<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card">
                    <div class="card-header login-header">
                        <h4>🔐 Selamat Datang Kembali!</h4>
                        <p class="mb-0 text-white-50">Masuk ke akun Anda</p>
                    </div>
                    <div class="card-body login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="name@example.com" required autofocus>
                                <label for="email">📧 Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Password" required>
                                <label for="password">🔒 Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-login">
                                    🚀 Masuk Sekarang
                                </button>
                            </div>
                        </form>

                        <div class="divider">
                            <span>atau</span>
                        </div>
                        
                        <div class="register-link">
                            <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>

                        <div class="test-accounts">
                            <h6>
                                <span>🎯</span>
                                Akun Demo untuk Testing
                            </h6>
                            
                            <div class="account-item">
                                <div class="account-label">👨‍💼 Administrator</div>
                                <div class="account-credentials">admin@blog.com / password</div>
                            </div>
                            
                            <div class="account-item">
                                <div class="account-label">✍️ Penulis</div>
                                <div class="account-credentials">author@blog.com / password</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
