<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter(Builder $query, $filter) {

        $query->when( $filter['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
            )
        );


        /**
         * 
         * Method 1: Using WhereExists
         * 
         */
        // $query->when( $filter['category'] ?? false, fn($query, $category) =>
        //     $query
        //         ->whereExists(fn($query) =>
        //             $query->from('categories')
        //                 ->whereColumn('categories.id', 'posts.category_id')
        //                 ->where('categories.slug', $category)
        //         )
        // );

        /**
         * 
         * Method 2: Using WhereHas
         * 
         */
        $query->when( $filter['category'] ?? false, fn($query, $category) =>
            $query->whereHas( 'category', fn(Builder $query) => $query->where('slug', $category) )
        );

        $query->when( $filter['author'] ?? false, fn($query, $author) =>
            $query->whereHas( 'author', fn(Builder $query) => $query->where('username', $author) )
        );

    }

    public static function findOrFail($key) {

        $post = (function() use ($key) {
            if (is_numeric($key)) {
                return static::find($key);
            } else {
                return static::where('slug', $key)->first();
            }
        })();

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
