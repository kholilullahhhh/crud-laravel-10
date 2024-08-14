@extends('layouts.index')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Tambah Buku Baru</h2>
    <form action="{{ route('store') }}" method="POST">
        @csrf

        <div class="form-group mb-4">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
                placeholder="Masukkan judul buku">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                id="pengarang" placeholder="Masukkan nama pengarang">
            @error('pengarang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="konten" class="form-label">Konten</label>
            <textarea class="form-control @error('konten') is-invalid @enderror" name="konten" id="konten" rows="5"
                placeholder="Masukkan konten buku"></textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary ml-2">
            <i class="fas fa-arrow-left"></i> Batal
        </a>
    </form>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

@endsection