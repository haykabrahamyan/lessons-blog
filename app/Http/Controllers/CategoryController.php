<?php

namespace App\Http\Controllers;

use App\Categoris;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id = false){
        if(!$id){
            die("Category Not Found");
        }
        $categories = Categoris::with(['filmsCategory.films'])->findOrFail($id);
        // if (!$categories){
        //     die("Chi Kareli");
        // }
        
        

        dd($categories);
    }
}
