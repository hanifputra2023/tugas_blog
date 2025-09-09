@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
.register-page {
    min-height: 100vh;
    background: linear-gradient(45deg, #2d1b69 0%, #11998e 50%, #38ef7d 100%);
    position: relative;
    overflow: hidden;
}

.register-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><polygon points="20,20 80,20 60,60" fill="rgba(255,255,255,0.05)"/><polygon points="10,70 30,50 50,90" fill="rgba(255,255,255,0.05)"/><polygon points="70,80 90,60 85,95" fill="rgba(255,255,255,0.05)"/></svg>');
    animation: float 25s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(180deg); }
}

.register-container {
    position: relative;
    z-index: 2;
    padding: 2rem 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
}

.register-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.register-card:hover {
    transform: translateY(-5px);
}

.register-header {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    padding: 3rem 2rem 2rem;
    text-align: center;
    position: relative;
}

.register-header::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: #fff;
    border-radius: 2px;
    opacity: 0.8;
}

.register-header h3 {
    color: white;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1.8rem;
}

.register-header p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    font-size: 1rem;
}

.register-body {
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
    border-color: #11998e;
    box-shadow: 0 0 0 3px rgba(17, 153, 142, 0.1);
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
    color: #11998e;
}

.btn-register {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
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

.btn-register::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-register:hover::before {
    left: 100%;
}

.btn-register:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(17, 153, 142, 0.4);
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

.login-link {
    text-align: center;
    margin-top: 2rem;
}

.login-link a {
    color: #11998e;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
}

.login-link a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #11998e;
    transition: width 0.3s ease;
}

.login-link a:hover::after {
    width: 100%;
}

.role-info {
    background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%);
    border: 1px solid #5eead4;
    border-radius: 16px;
    padding: 1.5rem;
    margin-top: 2rem;
}

.role-title {
    color: #0f766e;
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.role-explanation {
    background: white;
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 12px;
    border: 1px solid #d1fae5;
    transition: all 0.2s ease;
}

.role-explanation:hover {
    border-color: #10b981;
    transform: translateX(3px);
    box-shadow: 0 2px 8px rgba(16, 185, 129, 0.1);
}

.role-name {
    color: #065f46;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.role-description {
    color: #047857;
    font-size: 0.85rem;
    line-height: 1.4;
}

.guest-badge {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    color: #92400e;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    border: 1px solid #f59e0b;
}

.invalid-feedback {
    display: block;
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 5px;
}
</style>

<div class="register-page">
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-4">
                    <div class="register-card">
                        <div class="register-header">
                            <h3>Bergabung dengan Kami</h3>
                            <p>Buat akun baru untuk memulai perjalanan</p>
                        </div>
                        
                        <div class="register-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Nama lengkap Anda"
                                           required 
                                           autofocus>
                                    <i class="input-icon fas fa-user"></i>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="Alamat email Anda"
                                           required>
                                    <i class="input-icon fas fa-envelope"></i>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           name="password" 
                                           placeholder="Buat password yang kuat"
                                           required>
                                    <i class="input-icon fas fa-lock"></i>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" 
                                           class="form-control" 
                                           name="password_confirmation" 
                                           placeholder="Konfirmasi password Anda"
                                           required>
                                    <i class="input-icon fas fa-shield-alt"></i>
                                </div>

                                <input type="hidden" name="role" value="guest">

                                <button type="submit" class="btn btn-register">
                                    Daftar Sekarang
                                </button>
                            </form>

                            <div class="divider">
                                <span>atau</span>
                            </div>
                            
                            <div class="login-link">
                                <p class="mb-0">Sudah memiliki akun? <a href="{{ route('login') }}">Masuk sekarang</a></p>
                            </div>

                            <div class="role-info">
                                <div class="role-title">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Akun
                                </div>
                                
                                <div class="role-explanation">
                                    <div class="role-name">
                                        <i class="fas fa-user-tag"></i>
                                        Akun Baru: <span class="guest-badge">Guest</span>
                                    </div>
                                    <div class="role-description">
                                        Pendaftaran otomatis sebagai Guest. Anda dapat membaca dan berkomentar pada artikel.
                                    </div>
                                </div>
                                
                                <div class="role-explanation">
                                    <div class="role-name">
                                        <i class="fas fa-arrow-up"></i>
                                        Upgrade Akun
                                    </div>
                                    <div class="role-description">
                                        Untuk menjadi Author atau Admin, silakan hubungi administrator setelah mendaftar.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
