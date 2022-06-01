<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

// index, show, create, store, edit, update, destroy


// Route::get('/', function () {
//     return view('default');
// });

/**
 * Previous Approach
 */
// Route::get('/', function () {

//     /**
//      * 
//      * Doing some logging if necessary, we have used clockwork to replace the db log here already
//      * 
//      */
//     // DB::listen(function($query) {
//     //     logger($query->sql, $query->bindings);
//     // });
    
//     return view('posts', [
//         'posts' => Post::latest()->with('category')->with('author')->get(),
//         'categories' => Category::all()
//     ]);
// })->name('home');

/**
 * Current Approach
 */
Route::get('/', [PostController::class, 'index']);


/**
 * Previous Approach
 */
// Route::get('posts/{post:slug}', function (Post $post) {

//     return view('post', ['post' => $post]);
// });

/**
 * Current Approach
 */
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::post('posts/{post:slug}/comment', [PostCommentController::class, 'store']);


/**
 * Previous Approach
 */
// Route::get('categories/{category:slug}', function (Category $category) {

//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');

/**
 * Current Approach
 */
// replaced by PostController::index(), there is a search function inside with category filters



Route::get('/users', function () {

    $users = User::all();

    return view('users', ['users' => $users]);
});


/**
 * Previous Approach
 */
// Route::get('authors/{author:username}', function (User $author) {

//     /**
//      *
//      * Method 1: this will cause N + 1 Problem
//      * 
//      * return view('posts', ['posts' => $user->posts]);
//      * 
//      */
    
//     /**
//      *
//      * Method 2: eager loading for category and author
//      * 
//      * return view('posts', ['posts' => Post::with('category', 'author')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get()]);
//      * 
//      */
//     // 

//     /**
//      *
//      * Method 3: better way to resolve N + 1 Problem
//      * 
//      */
//     return view('posts', [
//         'posts' => $author->posts->load(['category', 'author']),#,
//         'categories' => Category::all()
//     ]);
// });
/**
 * Current Approach
 */
// replaced by PostController::index(), there is a search function inside with category filters
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', NewsletterController::class);


// Admin
// Admin - Listing and Show Post
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');

// Admin - Edit and Update Post
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');

// Admin - Create and Store Post
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');

// Admin - Delete Post
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');