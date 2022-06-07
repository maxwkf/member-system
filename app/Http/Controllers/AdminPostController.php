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

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {
        $attributes = array_merge($this->validatePost(),[
            'user_id' => auth()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails'),
        ]);

        Post::create($attributes);

        return redirect("/")->with("success", "Post is created successfully");
    }

    public function edit(Post $post) {

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {

        $attributes = $this->validatePost($post);

        $attributes['user_id'] = auth()->user()->id;
        if (request('thumbnail') ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with("success", "Post is updated.");
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with("success", "Post deleted.");
    }

    protected function validatePost(?Post $post = null) {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique("posts", "slug")->ignore($post->id)],
            'excerpt' => 'required|max:255',
            'thumbnail' => $post->exists ? 'image' : 'required|image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
