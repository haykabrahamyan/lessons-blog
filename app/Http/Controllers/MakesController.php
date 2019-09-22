<?php

namespace App\Http\Controllers;

use App\Makes;
use Illuminate\Http\Request;

class MakesController extends Controller
{
    public function index(){
        $makes = Makes::get();
        return view('makes.index', ['makes'=>$makes]);
    }

    public function addMake(){
        return view('makes.add');
    }

    public function addMakePost(Request $request){
        $validationRules = [
            'name' => 'required|unique:makes,name',
            'logo' => 'mimes:jpeg,jpg,png'
        ];
        if($request->has('id')){
            $makes = Makes::find($request->id);
            if (!$makes){
                return redirect('/makes')->withErrors(["Make not Found!"]);
            }
            $validationRules['name'] = $validationRules['name'] . ',' . $request->id;
        }else{
            $makes = new Makes();
        }

        
        $validator = \Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $makes->name = $request->name;

        if ($request->hasFile('logo')){
            $file_name = $request->name . '_' . time() . '.jpg';
            $request->logo->storeAs('public/images', $file_name);
            $makes->logo = $file_name;
        }
        
        $makes->save();

        return redirect('/makes')->with('message', 'Thank you for adding Make - ' . $makes->name);
    }

    public function edit($id = false){
        if (!$id){
            return redirect('/makes')->withErrors(["Make not Found!"]);
        }
        $make = Makes::find($id);
        if (!$make){
            return redirect('/makes')->withErrors(["Make not Found!"]);
        }
        return view('makes.edit', ['make' => $make]);
    }

    public function remove($id = false){
        if (!$id){
            return redirect('/makes')->withErrors(["Make not Found!"]);
        }
        $make = Makes::find($id);
        if (!$make){
            return redirect('/makes')->withErrors(["Make not Found!"]);
        }
        $name = $make->name;
        if ($make->models->count()){
            return redirect('/makes')->withErrors([$name . "Can't be deleted dou to relational makes."]);
        }
        
        unlink(public_path('/storage/images/' . $make->logo));
        $make->delete();

        return redirect()->back()->with('message', 'You have successfully removed  - ' . $name);
    }

}
