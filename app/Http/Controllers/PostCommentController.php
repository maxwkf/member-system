<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post) {

        // validation
        request()->validate([
            'body' => 'required',
        ]);

        // $post->comments()->create([
        //     'body' => request()->body,
        //     'user_id' => auth()->user()->id,
        // ]);

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => request()->user()->id,
        ]);


        return back();
    }
}
