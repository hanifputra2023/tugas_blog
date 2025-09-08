<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'category'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        // Cek role: hanya admin dan author yang bisa membuat post
        if (!in_array(Auth::user()->role, ['admin', 'author'])) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki akses untuk membuat post!');
        }

        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        // Cek role: hanya admin dan author yang bisa membuat post
        if (!in_array(Auth::user()->role, ['admin', 'author'])) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki akses untuk membuat post!');
        }

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'desc' => 'nullable',
            'cat_id' => 'required|exists:categories,id',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'desc' => $request->desc,
            'user_id' => Auth::user()->id, // Gunakan user yang login
            'cat_id' => $request->cat_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['user', 'category'])->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $post = Post::findOrFail($id);

        // Cek role: admin bisa edit semua, author hanya bisa edit miliknya sendiri
        if (Auth::user()->role === 'guest' || 
            (Auth::user()->role === 'author' && $post->user_id !== Auth::user()->id)) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki akses untuk mengedit post ini!');
        }

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $post = Post::findOrFail($id);

        // Cek role: admin bisa edit semua, author hanya bisa edit miliknya sendiri
        if (Auth::user()->role === 'guest' || 
            (Auth::user()->role === 'author' && $post->user_id !== Auth::user()->id)) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki akses untuk mengedit post ini!');
        }

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'desc' => 'nullable',
            'cat_id' => 'required|exists:categories,id',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'desc' => $request->desc,
            'cat_id' => $request->cat_id,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $post = Post::findOrFail($id);

        // Cek role: admin bisa hapus semua, author hanya bisa hapus miliknya sendiri
        if (Auth::user()->role === 'guest' || 
            (Auth::user()->role === 'author' && $post->user_id !== Auth::user()->id)) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki akses untuk menghapus post ini!');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }
}
