<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function create(CommentRequest $request)
    {
        $user_id = Auth::id();
        $comment = $request->all();
        $comment = [
            'user_id' => $user_id,
            'store_id' => $comment['store_id'],
            'star' => $comment['star'],
            'comment' => $comment['comment']
        ];
        Comment::create($comment);

        return back();
    }
}
