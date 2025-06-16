<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->where('board_id', Auth::id())
            ->get();

        return view('dashboard', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = [
            'name' => trim($request->input('name')),
            'board_id' => Auth::id(),
        ];

        Category::create($data);

        return Redirect::route('board.show');
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function edit($id)
    {
        $category = $this->show($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->show($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $data = [
            'name' => trim($request->input('name')),
            'board_id' => Auth::id()
        ];

        $category->update($data);

        return Redirect::route('board.show');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect::route('board.show');
    }
}
