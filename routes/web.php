<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('default');
// });
Route::get('/users', function () {

    $users = User::all();

    return view('users', ['users' => $users]);
});
Route::get('/', function () {

    /**
     * 
     * Doing some logging if necessary, we have used clockwork to replace the db log here already
     * 
     */
    // DB::listen(function($query) {
    //     logger($query->sql, $query->bindings);
    // });
    
    return view('posts', [
        'posts' => Post::with('category')->with('author')->get(),
        'categories' => Category::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('authors/{user}', function (User $user) {

    /**
     *
     * Method 1: this will cause N + 1 Problem
     * 
     * return view('posts', ['posts' => $user->posts]);
     * 
     */
    
    /**
     *
     * Method 2: eager loading for category and author
     * 
     * return view('posts', ['posts' => Post::with('category', 'author')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get()]);
     * 
     */
    // 

    /**
     *
     * Method 3: better way to resolve N + 1 Problem
     * 
     */
    return view('posts', [
        'posts' => $user->posts->load(['category', 'author']),#,
        'categories' => Category::all()
    ]);
});