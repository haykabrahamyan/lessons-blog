<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    public $table = 'films';

    public function filmsCategory(){
        return $this->hasMany(FilmsCategory::class,'film_id', 'id');
    }

}
