@extends('layouts.app')

@section('title', 'Buat Kategori Baru')

@section('content')
<style>
.create-category-page {
    min-height: 100vh;
    background: linear-gradient(45deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%);
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
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
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.create-card:hover {
    transform: translateY(-5px);
}

.create-header {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    padding: 2.5rem 2rem;
    text-align: center;
    position: relative;
}

.create-header::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 4px;
    background: #fff;
    border-radius: 2px;
    opacity: 0.8;
}

.create-header h4 {
    color: white;
    font-weight: 700;
    margin: 0;
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.create-body {
    padding: 2.5rem;
}

.form-group {
    margin-bottom: 2rem;
    position: relative;
}

.form-label {
    color: #374151;
    font-weight: 600;
    font-size: 0.95rem;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-control {
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 15px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
    width: 100%;
}

.form-control:focus {
    border-color: #ff9a9e;
    box-shadow: 0 0 0 3px rgba(255, 154, 158, 0.1);
    background: white;
    outline: none;
}

.form-control::placeholder {
    color: #9ca3af;
    font-weight: 400;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2.5rem;
    gap: 1rem;
}

.btn-back {
    background: #6b7280;
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 600;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-back:hover {
    background: #4b5563;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
}

.btn-save {
    background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-save::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-save:hover::before {
    left: 100%;
}

.btn-save:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(255, 154, 158, 0.4);
}

.category-info {
    background: linear-gradient(135deg, #fef7f7 0%, #fdeaef 100%);
    border: 1px solid #f3c5d4;
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.category-info-icon {
    background: #ff9a9e;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.category-info-text {
    color: #7c2d12;
    font-weight: 500;
    font-size: 0.9rem;
}

.invalid-feedback {
    display: block;
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 500;
}

.form-control.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

@media (max-width: 768px) {
    .create-body {
        padding: 1.5rem;
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
