<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmsCategory extends Model
{
    public $table = 'films_category';
    public $timestamps = false;

    public function category(){
        return $this->hasOne(Categoris::class,'id','category_id');//->select('name', 'id')->where('name','action');
    }

    public function films(){
        return $this->hasOne(Films::class,'id','film_id');//->select('name', 'id')->where('name','action');
    }
}
