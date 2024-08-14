@extends('layouts.index')

@section('content')

<div class="container mt-5" style="background-color: #f7f7f7; padding: 20px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Buku</h2>
        <a href="{{ route('create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-plus"></i> Tambah Buku
        </a>
    </div>

    <form method="GET" action="{{ route('index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Cari buku..."
                value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </div>
    </form>

    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col"><i class="fas fa-book"></i> Judul</th>
                <th scope="col"><i class="fas fa-user"></i> Pengarang</th>
                <th scope="col"><i class="fas fa-align-left"></i> Konten</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $i)
                <tr>
                    <th scope="row">{{ $buku->firstItem() + $loop->index }}</th>
                    <td>{{ $i->judul }}</td>
                    <td>{{ $i->pengarang }}</td>
                    <td>{{ Str::limit($i->konten, 50) }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('edit', $i->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip"
                                title="Edit Buku">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('delete', $i->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip"
                                    title="Hapus Buku">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $buku->links('pagination::bootstrap-4') }}
    </div>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection