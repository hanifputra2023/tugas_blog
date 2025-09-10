@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<style>
.edit-hero {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 25%, #ff9a9e 50%, #ad5389 75%, #3c1053 100%);
    background-size: 400% 400%;
    animation: editGradient 15s ease infinite;
    padding: 4rem 0 6rem;
    margin: -90px -15px 3rem -15px;
    position: relative;
    overflow: hidden;
}

@keyframes editGradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.edit-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120"><defs><pattern id="edit-pattern" width="24" height="24" patternUnits="userSpaceOnUse"><circle cx="12" cy="12" r="3" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.05)" stroke-width="1"/><path d="M6 6 L18 18 M18 6 L6 18" stroke="rgba(255,255,255,0.03)" stroke-width="0.5"/></pattern></defs><rect width="120" height="120" fill="url(%23edit-pattern)"/></svg>');
    animation: patternFloat 25s ease-in-out infinite;
}

@keyframes patternFloat {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    50% { transform: translateY(-15px) translateX(10px); }
}

.edit-hero-content {
    position: relative;
    z-index: 2;
    color: white;
    text-align: center;
    padding-top: 2rem;
}

.edit-title {
    font-size: 2.8rem;
    font-weight: 900;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #ffffff, #fff8dc, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.4));
}

.edit-subtitle {
    font-size: 1.2rem;
    font-weight: 600;
    opacity: 0.9;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.form-container {
    max-width: 700px;
    margin: 0 auto;
    padding: 0 1rem;
}

.form-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(25px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 25px;
    padding: 3rem;
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.15),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    position: relative;
    animation: slideUp 0.8s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ffecd2, #fcb69f, #ff9a9e);
    border-radius: 25px 25px 0 0;
}

.form-group {
    margin-bottom: 2rem;
    position: relative;
}

.form-label {
    font-weight: 700;
    font-size: 1.1rem;
    color: #2c3e50;
    margin-bottom: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-label i {
    color: #ff9a9e;
    font-size: 1.2rem;
}

.form-control {
    border: 2px solid rgba(255, 154, 158, 0.3);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.form-control:focus {
    border-color: #ff9a9e;
    box-shadow: 0 0 0 3px rgba(255, 154, 158, 0.2);
    background: rgba(255, 255, 255, 0.95);
    outline: none;
}

.form-control.is-invalid {
    border-color: #dc3545;
    background: rgba(220, 53, 69, 0.05);
}

.invalid-feedback {
    font-size: 0.9rem;
    font-weight: 600;
    color: #dc3545;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.invalid-feedback::before {
    content: '⚠️';
    font-size: 1rem;
}

.btn-group-modern {
    display: flex;
    gap: 1rem;
    justify-content: space-between;
    margin-top: 2.5rem;
    flex-wrap: wrap;
}

.btn-modern {
    border: none;
    border-radius: 20px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    min-width: 160px;
    justify-content: center;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s;
}

.btn-modern:hover::before {
    left: 100%;
}

.btn-back {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-back:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
}

.btn-submit {
    background: linear-gradient(45deg, #ff9a9e, #fcb69f);
    color: white;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

.btn-submit:hover {
    color: white;
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 15px 35px rgba(255, 154, 158, 0.4);
}

.category-preview {
    background: linear-gradient(135deg, #fff5f5 0%, #ffe8e8 100%);
    border: 2px solid rgba(255, 154, 158, 0.3);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    position: relative;
}

.category-preview::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ff9a9e, #fcb69f);
    border-radius: 15px 15px 0 0;
}

.preview-title {
    color: #d63031;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.preview-name {
    color: #e17055;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .edit-hero {
        padding: 3rem 0 4rem;
        margin: -90px -15px 2rem -15px;
    }
    
    .edit-title {
        font-size: 2.2rem;
    }
    
    .form-card {
        padding: 2rem 1.5rem;
        margin: 0 1rem;
    }
    
    .btn-group-modern {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn-modern {
        width: 100%;
    }
}
</style>

<div class="edit-hero">
    <div class="container">
        <div class="edit-hero-content">
            <h1 class="edit-title">
                <i class="fas fa-edit me-3"></i>Edit Kategori
            </h1>
            <p class="edit-subtitle">Perbarui informasi kategori "{{ $category->name }}"</p>
        </div>
    </div>
</div>

<div class="form-container">
    <div class="form-card">
        <div class="category-preview">
            <div class="preview-title">
                <i class="fas fa-eye"></i>
                Preview Kategori
            </div>
            <div class="preview-name" id="category-preview-name">{{ $category->name }}</div>
            <div class="text-muted" id="category-preview-desc">{{ $category->desc ?: 'Belum ada deskripsi' }}</div>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" id="edit-form">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-tag"></i>
                    Nama Kategori
                </label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $category->name) }}" 
                       required
                       placeholder="Masukkan nama kategori..."
                       oninput="updatePreview()">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desc" class="form-label">
                    <i class="fas fa-align-left"></i>
                    Deskripsi Kategori
                </label>
                <textarea class="form-control @error('desc') is-invalid @enderror" 
                          id="desc" 
                          name="desc" 
                          rows="4"
                          placeholder="Berikan deskripsi singkat tentang kategori ini..."
                          oninput="updatePreview()">{{ old('desc', $category->desc) }}</textarea>
                @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-group-modern">
                <a href="{{ route('categories.show', $category->id) }}" class="btn-modern btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="submit" class="btn-modern btn-submit">
                    <i class="fas fa-save"></i>
                    Update Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function updatePreview() {
    const nameInput = document.getElementById('name');
    const descInput = document.getElementById('desc');
    const previewName = document.getElementById('category-preview-name');
    const previewDesc = document.getElementById('category-preview-desc');
    
    previewName.textContent = nameInput.value || '{{ $category->name }}';
    previewDesc.textContent = descInput.value || 'Belum ada deskripsi';
}

// Add smooth form submission
document.getElementById('edit-form').addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('.btn-submit');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
});
</script>
@endsection
