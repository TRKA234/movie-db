@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 700px;">
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Kategori</a>
    <div class="card shadow-lg" style="background-color:#232323;">
        <div class="card-body">
            <h2 class="card-title mb-2" style="color:#f5c518;">{{ $category->category_name }}</h2>
            <p class="card-text" style="color:#fff;">{{ $category->description }}</p>
            <hr style="border-color:#444;">
            <h5 style="color:#f5c518;">Daftar Movie dalam Kategori ini:</h5>
            <ul class="mb-0" style="color:#fff;">
                @forelse($category->movies as $movie)
                    <li>
                        <span style="color:#f5c518;">{{ $movie->title }}</span>
                        <span class="text-muted">({{ $movie->year }})</span>
                    </li>
                @empty
                    <li><em>Belum ada movie.</em></li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
