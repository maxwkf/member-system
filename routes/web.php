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
//     return view('welcome');
// });
Route::get('/users', function () {

    $users = User::all();

    return view('users', ['users' => $users]);
});
Route::get('/', function () {

    // DB::listen(function($query) {
    //     logger($query->sql, $query->bindings);
    // });
    
    // return view('posts', ['posts' => Post::all()]);
    return view('posts', ['posts' => Post::with('category')->with('author')->get()]);
});

Route::get('posts/{post:slug}', function (Post $post) {

    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', ['posts' => $category->posts]);
});

Route::get('authors/{user}', function (User $user) {

    // this will cause N + 1 Problem
    // return view('posts', ['posts' => $user->posts]);
    
    // eager loading for category and author
    return view('posts', ['posts' => Post::with('category', 'author')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get()]);
});