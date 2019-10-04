<?php

namespace App\Http\Controllers;

use App\Profiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // public function getUser

    public function createUsers(){
        $user = new User();
        $user->name = 'Hayk';
        $user->email = 'devabrahamyan@gmail.com';
        $user->password = bcrypt(123456);
        $user->save();

        User::updateOrCreate([
            'name' => 'hayk', 'age' => 27
        ],[
            'last_name' => 'abrahamyan'
        ]);
    }

    public function getUsers(){
        // $user = User::where('email','=', 'devabrahamyan@gmail.com')->orWhere('name', 'Hayk')->orderBy('id', "DESC")->offset(100)->limit(3)->get();
        // $user = User::find(1);

        $user = User::with(['posts','profile'])->whereHas('posts', function($q){
            $q->where('score', '>', 3);
        })->get()->toArray();

        // $user = User::with(['posts' => function($q){
        //     $q->where('score', '>', 3);
        // },'profile'])->get()->toArray();

        // $user = User::with('posts')->has('posts')->get()->toArray();

        // dd($user);
        $user = User::find(7);
        // dd($user);


        $this->testProfile($user);
    

        
    }


    public function testProfile($user){
        dd($user->profile()->pluck('profesion')->first());
        $profile = $user->profile()->pluck('profesion');

        echo "<pre>";
        print_r($profile);
        die;
    }

    public function getRegistration(){
        return view('user.registration');
    }

    public function postRegistration(Request $request){
        // $messages = [
        //     'required'    => 'aaaaaaaaaaaaaaaaaaaaa',
        //     'numeric'    => 'The :attribute must be exactly :size.',
        //     'between' => 'The :attribute value :input is not between :min - :max.',
        //     'in'      => 'The :attribute must be one of the following types: :values',
        // ];
        echo $request->session()->get('ttt');

        $validator = Validator::make($request->all(), [
            'age' => 'required|numeric',
            'xxx' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/users/registration')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile = new Profiles();
        $profile->user_id = $user->id;
        $profile->age = $request->age;
        $profile->profesion = $request->proffestion;
        $profile->xxx = $request->xxx;
        $profile->save();


        return redirect()->back()->with('message', 'Thank you for Registration');
        
    }
}
