@extends('layouts.app')

@section('title', 'Buat Kategori Baru')

@section('content')
<style>
body {
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Inter', sans-serif;
}
.create-category-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    position: relative;
    overflow: hidden;
    padding: 3rem 0 2rem 0;
}
.create-category-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect x="10" y="10" width="15" height="15" fill="rgba(255,255,255,0.08)" rx="3"/><rect x="70" y="20" width="10" height="10" fill="rgba(255,255,255,0.08)" rx="2"/><rect x="30" y="60" width="12" height="12" fill="rgba(255,255,255,0.08)" rx="2"/><rect x="80" y="70" width="8" height="8" fill="rgba(255,255,255,0.08)" rx="1"/></svg>');
    animation: float 25s ease-in-out infinite;
    opacity: 0.5;
}
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(180deg); }
}
.create-container {
    position: relative;
    z-index: 2;
}
.create-card {
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(16px);
    border: 1.5px solid #e3e6ee;
    border-radius: 32px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    overflow: hidden;
    transition: transform 0.3s ease;
}
.create-card:hover {
    transform: translateY(-5px) scale(1.01);
}
.create-header {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    padding: 3rem 0 4rem;
    margin: -80px -15px 2rem -15px;
    text-align: center;
    position: relative;
    border-radius: 0 0 32px 32px;
    box-shadow: 0 12px 40px rgba(79,140,255,0.13);
    backdrop-filter: blur(6px);
}
.create-header h4 {
    color: white;
    font-weight: 900;
    margin: 0;
    font-size: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
    letter-spacing: 1px;
}
.create-body {
    padding: 2.5rem 2rem;
}
.category-info {
    background: linear-gradient(135deg, #f5f6fa 0%, #e3e6ee 100%);
    border: 1.5px solid #e3e6ee;
    border-radius: 14px;
    padding: 1rem 1.2rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.10);
}
.category-info-icon {
    background: #4f8cff;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}
.category-info-text {
    color: #23395d;
    font-weight: 600;
    font-size: 1rem;
}
.form-group {
    margin-bottom: 2rem;
    position: relative;
}
.form-label {
    color: #23395d;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 10px;
}
.form-control {
    border: 2px solid #e3e6ee;
    border-radius: 12px;
    padding: 15px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
    width: 100%;
}
.form-control:focus {
    border-color: #4f8cff;
    box-shadow: 0 0 0 3px rgba(79,140,255,0.10);
    background: white;
    outline: none;
}
.form-control::placeholder {
    color: #868e96;
    font-weight: 400;
}
textarea.form-control {
    resize: vertical;
    min-height: 120px;
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
}
.btn-group {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 2.5rem;
    gap: 1rem;
}
.btn-back {
    background: #e3e6ee;
    border: none;
    border-radius: 14px;
    padding: 12px 24px;
    font-weight: 700;
    color: #23395d;
    text-decoration: none;
    transition: background 0.3s, color 0.3s;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.10);
}
.btn-back:hover {
    background: #cfd8e3;
    color: #23395d;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(79,140,255,0.10);
}
.btn-save {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    border: none;
    border-radius: 14px;
    padding: 12px 24px;
    font-weight: 700;
    font-size: 1rem;
    color: white;
    transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 12px rgba(79,140,255,0.10);
}
.btn-save:hover {
    box-shadow: 0 8px 24px rgba(79,140,255,0.18);
    transform: translateY(-2px) scale(1.04);
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
}
.invalid-feedback {
    display: block;
    color: #c82333;
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 500;
}
.form-control.is-invalid {
    border-color: #c82333;
    box-shadow: 0 0 0 3px rgba(200, 35, 51, 0.1);
}
@media (max-width: 768px) {
    .create-body {
        padding: 1.2rem;
    }
    .btn-group {
        flex-direction: column-reverse;
        align-items: stretch;
    }
    .btn-back, .btn-save {
        width: 100%;
        justify-content: center;
    }
}
</style>
<div class="create-category-page">
    <div class="create-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="create-card">
                        <div class="create-header">
                            <h4>
                                <i class="fas fa-plus-circle"></i>
                                Buat Kategori Baru
                            </h4>
                        </div>
                        <div class="create-body">
                            <div class="category-info">
                                <div class="category-info-icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <div class="category-info-text">
                                    Kategori membantu mengorganisir dan mengelompokkan post blog Anda
                                </div>
                            </div>
                            <form action="{{ route('categories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-tag"></i>
                                        Nama Kategori
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Masukkan nama kategori yang unik..."
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="form-label">
                                        <i class="fas fa-align-left"></i>
                                        Deskripsi
                                    </label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" 
                                              id="desc" 
                                              name="desc" 
                                              rows="4"
                                              placeholder="Berikan deskripsi singkat tentang kategori ini... (opsional)">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('categories.index') }}" class="btn-back">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn-save">
                                        <i class="fas fa-save"></i>
                                        Simpan Kategori
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
