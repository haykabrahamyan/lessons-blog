<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    public function make(){
        return $this->hasOne(Makes::class, 'id', 'make_id');
    }

    public function model(){
        return $this->hasOne(Models::class, 'id', 'model_id');
    }
}
