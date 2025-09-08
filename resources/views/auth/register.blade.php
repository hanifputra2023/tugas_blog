@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">📝 Daftar Akun Baru</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="role" value="guest">
                        <div class="alert alert-info">
                            📝 <strong>Info:</strong> Pendaftaran otomatis sebagai <strong>Guest (Pengunjung)</strong>. 
                            Untuk menjadi Author atau Admin, hubungi administrator.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" 
                               id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">🎉 Daftar</button>
                    </div>
                </form>

                <hr>
                
                <div class="text-center">
                    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                </div>

                <div class="mt-3">
                    <h6>📋 Penjelasan Role:</h6>
                    <small class="text-muted">
                        <strong>👤 Guest:</strong> Hanya bisa membaca post<br>
                        <strong>✍️ Author:</strong> Bisa membuat dan mengedit post sendiri<br>
                        <strong>👑 Admin:</strong> Bisa mengelola semua post dan kategori
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
