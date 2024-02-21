<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')
        ->where('id','!=',Auth::id())
        // ->select('images',)
        ->get();
        
        // dd($users);

    return view('users.search',['users'=>$users]);
    }
}
