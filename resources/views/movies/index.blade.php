@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4" style="color:#f5c518;">Movie List</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('movies.create') }}" class="btn btn-success mb-3"> Tambah Movie</a>
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow" style="border-radius: 12px;">
                        <img src="{{ asset($movie->cover_image) }}" class="card-img-top" alt="{{ $movie->title }}"
                            style="height:340px;object-fit:cover;border-top-left-radius:12px;border-top-right-radius:12px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#f5c518;">{{ $movie->title }}</h5>
                            <p class="card-text"><small class="text-muted">{{ $movie->year }}</small></p>
                            <p class="card-text" style="color:#fff;">
                                {{ \Illuminate\Support\Str::limit($movie->synopsis, 60) }}</p>
                            <span class="badge bg-secondary">{{ $movie->category->category_name ?? '-' }}</span>
                        </div>
                        <div class="card-footer text-center" style="background:#232323;">
                            <a href="{{ route('movies.show', ['id' => $movie->id, 'slug' => $movie->slug]) }}"
                                class="btn btn-sm btn-primary me-1">Detail</a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            @can('delete')
                                <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this movie?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $movies->links() }}
        </div>
    </div>
@endsection
