<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::query()
            ->where('user_id', Auth::id())
            ->get();

        return view('dashboard', compact('boards'));
    }

    public function create()
    {
        return view('board.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $data = [
            'title' => trim($request->input('title')),
            'user_id' => Auth::id()
        ];

        Board::create($data);

        return Redirect::route('dashboard');
    }

    public function show($id)
    {
        return Board::findOrFail($id);
    }

    public function edit($id)
    {
        $board = $this->show($id);

        return view('board.edit', compact('board'));
    }

    public function update(Request $request, $id)
    {
        $board = $this->show($id);

        if (!$board) {
            return response()->json(['message' => 'Board not found'], 404);
        }

        $data = [
            'title' => trim($request->input('title')),
            'user_id' => Auth::id()
        ];

        $board->update($data);

        return Redirect::route('dashboard');
    }

    public function destroy($id)
    {
        $board = Board::findOrFail($id);
        $board->delete();

        return Redirect::route('dashboard');
    }

    public function showInfoBoard($id)
    {
        $board = $this->show($id);

        return view('board.show', compact('board'));
    }
}
