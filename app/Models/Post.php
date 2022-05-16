<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    public static function findOrFail($id) {
        $post = static::find($id);
        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
