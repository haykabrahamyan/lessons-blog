<?php

namespace App\Http\Controllers;

use App\Categoris;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index($name = 'hayk'){
        $data = ['name'=>$name, 'age'=>55];
        return view('home.index', $data);
    }

    public function users(){
        $users = [
            ["name" => "aaaaaa", "age" => 11, "gender" => "Male"],
            ["name" => "bbbbb", "age" => 14, "gender" => "Male"],
            ["name" => "ccccc", "age" => 11, "gender" => "Female"],
            ["name" => "ddddd", "age" => 17, "gender" => "Male"],
            ["name" => "eeeee", "age" => 19, "gender" => "Female"],
            ["name" => "rrrrr", "age" => 31, "gender" => "Male"],
        ];
        return view('home.user',['users'=>$users]);

        $arr['users'] = [
            
        ];
    }
    public function getNumber(){
        return 9;
    }

    public function about(){
        return view('home.about');
    }

    public static function getCategories(){
        $categories = Categoris::get();
        return $categories;
    }
}
