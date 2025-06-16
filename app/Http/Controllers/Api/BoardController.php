<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Auth::user()->boards()->with('categories.tasks')->get();

        $board = Board::all();
        return $board->load('categories.tasks');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string'
        // ]);

        // return auth()->user()->boards()->create($request->only('title'));
    }

    /**
     * Display the specified resource.
     */
   public function show(Board $board)
    {
        // $this->authorize('view', $board);
        return $board->load('categories.tasks');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        // $this->authorize('update', $board);
        $request->validate([
            'title' => 'required|string'
        ]);

        $board->update($request->only('title'));
        return $board;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        // $this->authorize('delete', $board);

        $board->delete();
        return response()->noContent();
    }
}
