<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Tampilkan daftar movie
    public function index()
    {
        $movies = Movie::with('category')->latest()->paginate(12);
        return view('movies.index', compact('movies'));
    }

    // Tampilkan form tambah movie
    public function create()
    {
        $categories = Category::all();
        return view('movies.create', compact('categories'));
    }

    // Simpan movie baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|unique:movies,slug|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string|max:255',
            'cover_image' => 'nullable|url|max:255',
        ]);

        Movie::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'year' => $request->year,
            'actors' => $request->actors,
            'cover_image' => $request->cover_image,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie berhasil ditambahkan!');
    }

    // Tampilkan detail movie
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Tampilkan form edit movie
    public function edit(Movie $movie)
    {
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'categories'));
    }

    // Update movie
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string|max:255',
            'cover_image' => 'nullable|url|max:255',
        ]);

        $movie->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'year' => $request->year,
            'actors' => $request->actors,
            'cover_image' => $request->cover_image,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie berhasil diupdate!');
    }

    // Hapus movie
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie berhasil dihapus!');
    }
}
