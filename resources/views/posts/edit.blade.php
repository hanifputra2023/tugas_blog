@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>✏️ Edit Post: {{ $post->title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Post</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" 
                                  id="desc" name="desc" rows="2">{{ old('desc', $post->desc) }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cat_id" class="form-label">Kategori</label>
                        <select class="form-select @error('cat_id') is-invalid @enderror" 
                                id="cat_id" name="cat_id" required>
                            <option value="">Pilih Kategori</option>
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

                    <div class="mb-3">
                        <label for="body" class="form-label">Isi Post</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" 
                                  id="body" name="body" rows="10" required>{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">← Kembali</a>
                        <button type="submit" class="btn btn-primary">💾 Update Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
