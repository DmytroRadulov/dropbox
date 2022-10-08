<?php

namespace web\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    public function posts()
    {
        return $this->hasMany(Post::class)->withTimestamps();
    }

}