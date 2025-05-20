@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px;">
    <a href="{{ route('movies.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Movie</a>
    <div class="card mb-3 shadow-lg" style="background-color: #232323;">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center p-3">
                <img src="{{ $movie->cover_image }}" class="img-fluid rounded shadow" alt="{{ $movie->title }}" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title mb-2" style="color:#f5c518;">{{ $movie->title }}</h2>
                    <span class="badge bg-secondary mb-2">{{ $movie->category->category_name ?? '-' }}</span>
                    <p class="card-text mt-3" style="color:#fff;">{{ $movie->synopsis }}</p>
                    <p class="card-text"><strong>Pemeran:</strong> <span style="color:#f5c518;">{{ $movie->actors }}</span></p>
                    <p class="card-text"><strong>Tahun:</strong> <span style="color:#f5c518;">{{ $movie->year }}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
