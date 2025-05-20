@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4" style="color:#f5c518;">Daftar Kategori</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Tambah Kategori</a>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead style="background-color:#181818;">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $i => $category)
                        <tr style="border-bottom:1px solid #333;">
                            <td>{{ $categories->firstItem() + $i }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category) }}"
                                    class="btn btn-sm btn-primary me-1">Detail</a>
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="btn btn-sm btn-warning me-1">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
