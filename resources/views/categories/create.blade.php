{{-- Contoh untuk create.blade.php dan edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="card shadow-lg" style="background-color:#232323;">
        <div class="card-body">
            <h1 class="mb-4 text-center" style="color:#f5c518;">
                {{ isset($category) ? 'Edit Kategori' : 'Tambah Kategori' }}
            </h1>
            <form action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" value="{{ $category->category_name ?? old('category_name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ $category->description ?? old('description') }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">{{ isset($category) ? 'Update' : 'Simpan' }}</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
