<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
           'comment' => 'required',
            'product_id' => 'required|numeric|exists:products,id'

        ]);
        Auth::user()->comments()->create($validated);
        return back()->with('message', (__('message.Comment sent successfully')));
    }
    public function destroy(Comment $comment){
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->withErrors((__('message.Comment successfully deleted')));
    }
}
