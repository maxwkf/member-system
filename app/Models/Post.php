<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

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
}
