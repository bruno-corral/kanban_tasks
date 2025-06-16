<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Auth::user()->boards()->with('categories.tasks')->get();

        // $board = Board::all();
        // return $board->load('categories.tasks');
    }

    public function create(Request $request)
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $data = [
            'name' => trim($request->input('name')),
            'board_id' => Auth::id()
        ];

        // dd($data);

        Category::create($data);

        return Redirect::route('board.show');
    }

//     /**
//      * Display the specified resource.
//      */
//    public function show(Category $category)
//     {
//         // $this->authorize('view', $board);
//         return $category->load('categories.tasks');
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, Category $board)
//     {
//         // $this->authorize('update', $board);
//         $request->validate([
//             'title' => 'required|string'
//         ]);

//         $board->update($request->only('title'));
//         return $board;
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Board $board)
//     {
//         // $this->authorize('delete', $board);

//         $board->delete();
//         return response()->noContent();
//     }
}
