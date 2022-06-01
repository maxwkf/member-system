<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        
        return view('admin.posts.index', [
            'posts' => Post::latest()->paginate(50)
        ]);
    }

    public function create(Post $post) {
        
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique("posts", "slug")],
            'excerpt' => 'required|max:255',
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes)->save();

        return back()->with("success", "Post is updated");
    }

    public function edit(Post $post) {

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {


        
        $attributes = request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique("posts", "slug")->ignore($post->id)],
            'excerpt' => 'required|max:255',
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->user()->id;
        if (request()->file('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with("success", "Post is updated.");
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with("success", "Post deleted.");
    }
}
