<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('getType', 'profile')->get();
        return view('admin.user.index', ['users' => $users]);
    }
}
