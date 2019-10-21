<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comments::all();
        return $comments;
    }

    public function store(Request $request)
    {
        $comment = new Comments();
        $comment->user_id = $request->user_id;
        $comment->post_by = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return $comment;
    }

}
