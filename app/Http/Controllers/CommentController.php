<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // Afișează toate comentariile
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    // Salvează un nou comentariu în baza de date
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'comment_text' => 'required'
        ]);

        Comment::create($request->all());

        return back()->with('success', 'Comentariul a fost adăugat cu succes!');
    }

    // Arată formularul pentru editarea unui comentariu specific
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    // Actualizează comentariul specificat în baza de date
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'comment_text' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comments.index')->with('success', 'Comentariul a fost actualizat cu succes!');
    }

    // Șterge comentariul specificat din baza de date
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comentariul a fost șters cu succes!');
    }
}
