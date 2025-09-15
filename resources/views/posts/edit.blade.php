@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<style>
.edit-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    position: relative;
    overflow: hidden;
    padding: 3rem 0 2rem 0;
}

.edit-container {
    position: relative;
    z-index: 2;
    max-width: 700px;
    margin: 0 auto;
}

.edit-card {
    background: rgba(255,255,255,0.96);
    border: 1.5px solid #e3e6ee;
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    overflow: hidden;
    transition: transform 0.3s ease;
    backdrop-filter: blur(3px);
    margin-bottom: 2rem;
}

.edit-header {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    padding: 2.2rem 2rem 1.2rem 2rem;
    text-align: center;
    position: relative;
    border-radius: 22px 22px 0 0;
    box-shadow: 0 8px 32px rgba(79,140,255,0.10);
}

.edit-header h4 {
    color: white;
    font-weight: 800;
    margin: 0;
    font-size: 1.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.edit-body {
    padding: 2.5rem 2.2rem 2.2rem 2.2rem;
}

.form-group {
    margin-bottom: 1.7rem;
    position: relative;
}

.form-label {
    color: #23395d;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-control, .form-select {
    border: 1.5px solid #e3e6ee;
    border-radius: 14px;
    padding: 12px 16px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f5f6fa;
    margin-bottom: 0.5rem;
}

.form-control:focus, .form-select:focus {
    border-color: #4f8cff;
    box-shadow: 0 0 0 3px rgba(79,140,255,0.10);
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
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
}

.btn-group {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 2.5rem;
    gap: 1.2rem;
}

.btn-back {
    background: #e3e6ee;
    border: none;
    border-radius: 14px;
    padding: 12px 24px;
    font-weight: 700;
    color: #23395d;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-back:hover {
    background: #cfd8e3;
    color: #23395d;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(79,140,255,0.10);
}

.btn-update {
    background: linear-gradient(90deg, #4f8cff 0%, #6dd5ed 100%);
    border: none;
    border-radius: 14px;
    padding: 12px 24px;
    font-weight: 800;
    font-size: 1rem;
    color: white;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.10);
}

.btn-update:hover {
    background: linear-gradient(90deg, #2563eb 0%, #4f8cff 100%);
    color: white;
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 8px 24px rgba(79,140,255,0.18);
}

.post-info {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    border: 1.5px solid #e3e6ee;
    border-radius: 14px;
    padding: 1rem 1.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 12px;
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
    font-size: 1.1rem;
}

.post-info-text {
    color: #23395d;
    font-weight: 600;
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

@media (max-width: 900px) {
    .edit-body {
        padding: 1.2rem;
    }
    .edit-container {
        max-width: 100%;
        padding: 0 1rem;
    }
    .btn-group {
        flex-direction: column-reverse;
        align-items: stretch;
        margin-top: 2rem;
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
