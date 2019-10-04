<?php

namespace App\Http\Controllers;

use App\Makes;
use App\Models;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    public function index(){
        $models = Models::with('make')->get();
        return view('models.index', ['models'=>$models]);
    }

    public function addModel(){
        $makes = Makes::get();
        return view('models.add', ['makes' => $makes]);
    }

    public function addModelPost(Request $request){
        if($request->has('id')){
            $models = Models::find($request->id);
            if (!$models){
                return redirect('/models')->withErrors(["Model not Found!"]);
            }
        }else{
            $models = new Models();
        }

        
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'make' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $models->name = $request->name;
        $models->make_id = $request->make;

        
        
        $models->save();

        return redirect('/models')->with('message', 'Thank you for adding Model - ' . $models->name);
    }

    public function edit($id = false){
        if (!$id){
            return redirect('/models')->withErrors(["Model not Found!"]);
        }
        $model = Models::find($id);
        if (!$model){
            return redirect('/models')->withErrors(["Model not Found!"]);
        }
        $makes = Makes::get();
        return view('models.edit', ['model' => $model, 'makes'=>$makes]);
    }
}
