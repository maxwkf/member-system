<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {

        /**
         * Normal
         */
        // return view('posts.index', [
        //     'posts' => Post::latest()->filter(request()->only('search', 'category', 'author'))->get()
        // ]);


        /**
         * JSON
         */
        // return Post::latest()->filter(request()->only('search', 'category', 'author'))->get();

        /**
         * Paginated
         */
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request()->only('search', 'category', 'author'))
                ->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

}
