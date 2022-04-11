<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Category extends Model {
        use HasFactory;
        public function post() {

            return $this->hasMany(Post::class, 'id', 'cat_id')->onDelete('cascade');
        }

          /*  public function delete(){
                static::deleted(function ($model) {
                    $model->releationship()->delete();
                }
            }*/


        //один ко многим, категория имеет много постов
    }
