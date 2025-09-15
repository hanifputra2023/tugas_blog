@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<style>
.edit-page {
    min-height: 100vh;
    background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
    position: relative;
    overflow: hidden;
    padding: 2rem 0;
}

.edit-card {
    background: rgba(255,255,255,0.92);
    border: 1.5px solid #e3e6ee;
    border-radius: 22px;
    box-shadow: 0 12px 40px rgba(60, 80, 120, 0.13);
    overflow: hidden;
    transition: transform 0.3s ease;
    backdrop-filter: blur(3px);
}

.edit-card:hover {
    transform: translateY(-4px) scale(1.01);
}

.edit-header {
    background: linear-gradient(120deg, #4f8cff 0%, #6dd5ed 100%);
    padding: 2rem;
    text-align: center;
    position: relative;
    border-radius: 22px 22px 0 0;
    box-shadow: 0 8px 32px rgba(79,140,255,0.10);
}

.edit-header h4 {
    color: white;
    font-weight: 900;
    margin: 0;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    letter-spacing: 0.7px;
    text-shadow: 0 2px 8px rgba(79,140,255,0.18);
}

.edit-body {
    padding: 2.2rem;
}

.preview-section {
    background: linear-gradient(90deg, #e3e6ee 0%, #f5f6fa 100%);
    border-radius: 14px;
    box-shadow: 0 2px 8px rgba(79,140,255,0.07);
    padding: 1.5rem 1.2rem;
    margin-bottom: 2rem;
    text-align: left;
}

.preview-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #23395d;
    margin-bottom: 0.7rem;
    letter-spacing: 0.5px;
}

.preview-category {
    font-size: 1.05rem;
    font-weight: 600;
    color: #4f8cff;
    margin-bottom: 0.3rem;
    text-transform: capitalize;
}

.preview-desc {
    font-size: 1rem;
    color: #495057;
    margin-bottom: 0.7rem;
}

.form-group {
    margin-bottom: 2rem;
    position: relative;
}

.form-label {
    color: #23395d;
    font-weight: 700;
    font-size: 1.05rem;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 8px;
    letter-spacing: 0.3px;
}

.form-control {
    font-size: 1.05rem;
    font-weight: 500;
    padding: 12px 16px;
    border-radius: 14px;
    border: 1.5px solid #e3e6ee;
    background: #f5f6fa;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #4f8cff;
    box-shadow: 0 0 0 3px rgba(79,140,255,0.10);
    background: white;
    outline: none;
}

.form-control::placeholder {
    color: #9ca3af;
    font-weight: 400;
}

.btn-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 2rem;
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

@media (max-width: 900px) {
    .edit-body {
        padding: 1.2rem;
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
    <div class="container">
        <div class="edit-card">
            <div class="edit-header">
                <h4>
                    <i class="fas fa-edit"></i>
                    Edit Kategori
                </h4>
            </div>
            <div class="edit-body">
                <div class="preview-section">
                    <div class="preview-title">Preview Kategori</div>
                    <div class="preview-category" id="category-preview-name">{{ $category->name }}</div>
                    <div class="preview-desc" id="category-preview-desc">{{ $category->desc ?: 'Belum ada deskripsi' }}</div>
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

                    <div class="btn-group">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn-update">
                            <i class="fas fa-save"></i>
                            Update Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
    const submitBtn = this.querySelector('.btn-update');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
});
</script>
@endsection
