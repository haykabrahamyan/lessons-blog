<?php

namespace App\Http\Controllers;

use App\Films;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    public function showFilms(){
        // $films = Films::get()->toArray();
        $films = Films::select('title','id')->whereHas('filmsCategory', function($query){
            // $query->where()
        })->with(['filmsCategory.category'])->get()->toArray();



        // dd($films);
        echo '<pre>';
        print_r($films);
        die;
    }
}
