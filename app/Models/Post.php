<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PostController;

class Post extends Model {
    use HasFactory;
    public function category() {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class,  'id','user_id');
    }
    //для выбора категории, один пост одна категория
}
