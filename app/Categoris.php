<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    public $table = 'category';

    public function filmsCategory(){
        return $this->hasMany(FilmsCategory::class,'category_id', 'id');
    }
}
