@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <div class="card shadow-lg" style="background-color: #232323;">
        <div class="card-body">
            <h1 class="mb-4 text-center" style="color:#f5c518;">Edit Movie</h1>
            <form action="{{ route('movies.update', $movie) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $movie->slug }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sinopsis</label>
                    <textarea name="synopsis" class="form-control" rows="3">{{ $movie->synopsis }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $movie->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="year" class="form-control" value="{{ $movie->year }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pemeran</label>
                    <input type="text" name="actors" class="form-control" value="{{ $movie->actors }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cover Image (URL)</label>
                    <input type="text" name="cover_image" class="form-control" value="{{ $movie->cover_image }}">
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
