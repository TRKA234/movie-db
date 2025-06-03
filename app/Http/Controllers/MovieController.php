<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            // 'slug' => 'required|unique:movies,slug|string|max:255',
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $slug = Str::slug($request->title);

        $count = Movie::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $coverImage = $file->store('covers', 'public');
            $coverImage = 'storage/' . $coverImage;
        } else {
            $coverImage = null;
        }


        Movie::create([
            'title' => $request->title,
            'slug' => $slug,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'year' => $request->year,
            'actors' => $request->actors,
            'cover_image' => $coverImage,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie berhasil ditambahkan!');
    }

    // Tampilkan detail movie
    public function show($id, $slug)
    {
        $movie = Movie::findOrFail($id);
        // Redirect jika slug di URL tidak sama dengan slug di database (SEO friendly)
        if ($movie->slug !== $slug) {
            return redirect()->route('movies.show', ['id' => $movie->id, 'slug' => $movie->slug]);
        }
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
            // 'slug' => 'required|string|max:255|unique:movies,slug,' . $movie->id,
            'synopsis' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer',
            'actors' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $slug = Str::slug($request->title);

        // Pastikan slug unik (kecuali untuk movie ini sendiri)
        $count = Movie::where('slug', $slug)->where('id', '!=', $movie->id)->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // Proses cover image
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $coverImage = $file->store('covers', 'public');
            $coverImage = 'storage/' . $coverImage;
        } else {
            $coverImage = $movie->cover_image; // pakai yang lama jika tidak upload baru
        }

        $movie->update([
            'title' => $request->title,
            'slug' => $slug,
            'synopsis' => $request->synopsis,
            'category_id' => $request->category_id,
            'year' => $request->year,
            'actors' => $request->actors,
            'cover_image' => $coverImage,
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
