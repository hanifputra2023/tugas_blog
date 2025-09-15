@extends('layouts.app')

@section('title', 'Buat Post Baru')

@section('content')
<style>
body {
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Inter', sans-serif;
}
.create-post-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    position: relative;
    overflow: hidden;
    padding: 3rem 0 2rem 0;
}

.create-post-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M20 20 L30 10 L40 20 L30 30 Z" fill="rgba(255,255,255,0.08)"/><path d="M60 30 L70 20 L80 30 L70 40 Z" fill="rgba(255,255,255,0.08)"/><path d="M10 60 L20 50 L30 60 L20 70 Z" fill="rgba(255,255,255,0.08)"/><path d="M75 75 L85 65 L95 75 L85 85 Z" fill="rgba(255,255,255,0.08)"/></svg>');
    animation: float 35s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-25px) rotate(360deg); }
}

.create-post-container {
    position: relative;
    z-index: 2;
}

.create-post-card {
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(16px);
    border: 1.5px solid #e3e6ee;
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.create-post-card:hover {
    transform: translateY(-5px) scale(1.01);
}

.create-post-header {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    padding: 2.5rem 2rem 2rem 2rem;
    text-align: center;
    position: relative;
    border-radius: 22px 22px 0 0;
    box-shadow: 0 8px 32px rgba(79,140,255,0.10);
}

.create-post-header::after {
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

.create-post-header h4 {
    color: white;
    font-weight: 900;
    margin: 0;
    font-size: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.create-post-body {
    padding: 2.5rem 2rem;
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

.form-control, .form-select {
    border: 2px solid #e3e6ee;
    border-radius: 12px;
    padding: 15px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
    width: 100%;
}

.form-control:focus, .form-select:focus {
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

.form-control.large-textarea {
    min-height: 200px;
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
    box-shadow: 0 8px 24px rgba(79,140,255,0.18);
    transform: translateY(-2px) scale(1.04);
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
}

.post-info {
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

.post-info-icon {
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

.post-info-text {
    color: #23395d;
    font-weight: 600;
    font-size: 1rem;
}

.invalid-feedback {
    display: block;
    color: #c82333;
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 500;
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: #c82333;
    box-shadow: 0 0 0 3px rgba(200, 35, 51, 0.1);
}

@media (max-width: 768px) {
    .create-post-body {
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

<div class="create-post-page">
    <div class="create-post-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="create-post-card">
                        <div class="create-post-header">
                            <h4>
                                <i class="fas fa-pen-fancy"></i>
                                Buat Post Baru
                            </h4>
                        </div>
                        
                        <div class="create-post-body">
                            <div class="post-info">
                                <div class="post-info-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div class="post-info-text">
                                    Tulis artikel yang menarik dan bermanfaat untuk dibagikan
                                </div>
                            </div>

                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="title" class="form-label">
                                        <i class="fas fa-heading"></i>
                                        Judul Post
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}" 
                                           placeholder="Masukkan judul post yang menarik dan descriptive..."
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="desc" class="form-label">
                                        <i class="fas fa-align-left"></i>
                                        Deskripsi Singkat
                                    </label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" 
                                              id="desc" 
                                              name="desc" 
                                              rows="3"
                                              placeholder="Tulis deskripsi singkat yang menarik untuk post ini...">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cat_id" class="form-label">
                                        <i class="fas fa-tags"></i>
                                        Kategori
                                    </label>
                                    <select class="form-select @error('cat_id') is-invalid @enderror" 
                                            id="cat_id" 
                                            name="cat_id" 
                                            required>
                                        <option value="">Pilih Kategori Post</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('cat_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="body" class="form-label">
                                        <i class="fas fa-paragraph"></i>
                                        Isi Post
                                    </label>
                                    <textarea class="form-control large-textarea @error('body') is-invalid @enderror" 
                                              id="body" 
                                              name="body" 
                                              rows="12" 
                                              placeholder="Tulis konten post Anda di sini... Berikan informasi yang bermanfaat dan menarik untuk dibaca oleh pengunjung blog."
                                              required>{{ old('body') }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="btn-group">
                                    <a href="{{ route('posts.index') }}" class="btn-back">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn-save">
                                        <i class="fas fa-save"></i>
                                        Simpan Post
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
