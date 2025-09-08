<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private function checkAdminRole()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat mengelola kategori.');
        }
    }

    private function checkAuth()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAdminRole();
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->checkAdminRole();
        
        $request->validate([
            'name' => 'required|max:255|unique:categories',
            'desc' => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with('posts.user')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->checkAdminRole();
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->checkAdminRole();
        
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'desc' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->checkAdminRole();
        
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
