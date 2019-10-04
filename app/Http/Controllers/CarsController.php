<?php

namespace App\Http\Controllers;

use App\Cars;
use App\Makes;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Cars::with(['make', 'model'])->get();
        return view('cars.index', ['cars' => $cars]);
    }

    public function addCars(){
        $makes = Makes::get();
        return view('cars.add', ['makes'=>$makes]);
    }

    public function getModels(Request $request){
        $validator = Validator::make($request->all(), [
            'make_id' => 'required|exists:makes,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>"Soryy, but make not found."], 404);
        }
        // 'game_id' => 'required|exists:games,id',
        $models = Models::where('make_id', $request->make_id)->get();

        return response()->json($models);
    }
}
