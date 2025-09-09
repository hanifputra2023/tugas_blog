@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<style>
.edit-page {
    min-height: 100vh;
    background: linear-gradient(45deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
}

.edit-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="30" cy="30" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="70" cy="70" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="20" cy="60" r="1.2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="0.8" fill="rgba(255,255,255,0.1)"/></svg>');
    animation: float 30s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.edit-container {
    position: relative;
    z-index: 2;
}

.edit-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.edit-card:hover {
    transform: translateY(-5px);
}

.edit-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem;
    text-align: center;
    position: relative;
}

.edit-header::after {
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

.edit-header h4 {
    color: white;
    font-weight: 700;
    margin: 0;
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.edit-body {
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

.form-control, .form-select {
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 12px 16px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f9fafb;
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
}

.form-control.large-textarea {
    min-height: 200px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
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

.btn-update {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

.btn-update::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-update:hover::before {
    left: 100%;
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.post-info {
    background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
    border: 1px solid #d1d5db;
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 12px;
}

.post-info-icon {
    background: #667eea;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
}

.post-info-text {
    color: #374151;
    font-weight: 500;
}

.invalid-feedback {
    display: block;
    color: #ef4444;
    font-size: 0.85rem;
    margin-top: 6px;
    font-weight: 500;
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: #ef4444;
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

@media (max-width: 768px) {
    .edit-body {
        padding: 1.5rem;
    }
    
    .btn-group {
        flex-direction: column-reverse;
        align-items: stretch;
    }
    
    .btn-back, .btn-update {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="edit-page">
    <div class="edit-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="edit-card">
                        <div class="edit-header">
                            <h4>
                                <i class="fas fa-edit"></i>
                                Edit Post
                            </h4>
                        </div>
                        
                        <div class="edit-body">
                            <div class="post-info">
                                <div class="post-info-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="post-info-text">
                                    Mengedit: <strong>{{ $post->title }}</strong>
                                </div>
                            </div>

                            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="title" class="form-label">
                                        <i class="fas fa-heading"></i>
                                        Judul Post
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $post->title) }}" 
                                           placeholder="Masukkan judul post yang menarik..."
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
                                              placeholder="Tulis deskripsi singkat yang menarik untuk post ini...">{{ old('desc', $post->desc) }}</textarea>
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
                                            <option value="{{ $category->id }}" 
                                                    {{ old('cat_id', $post->cat_id) == $category->id ? 'selected' : '' }}>
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
                                              placeholder="Tulis konten post Anda di sini... Berikan informasi yang bermanfaat dan menarik untuk dibaca."
                                              required>{{ old('body', $post->body) }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="btn-group">
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn-back">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn-update">
                                        <i class="fas fa-save"></i>
                                        Update Post
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
