@extends('layouts.index')

@section('content')

<div class="container mt-5">
    <h2>Detail Buku</h2>
    <div class="card mt-3">
        <div class="card-header">
            <h4>{{ $buku->judul }}</h4>
        </div>
        <div class="card-body">
            <!-- Display the book image -->
            <div class="mb-4">
                <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="img-fluid" style="max-height: 400px;">
            </div>
            
            <p><strong>Pengarang:</strong> {{ $buku->pengarang }}</p>
            <p><strong>Konten:</strong> {{ $buku->konten }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('edit', $buku->id) }}" class="btn btn-primary">Edit Buku</a>
            <form action="{{ route('delete', $buku->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Hapus Buku</button>
            </form>
        </div>
    </div>
</div>

@endsection
