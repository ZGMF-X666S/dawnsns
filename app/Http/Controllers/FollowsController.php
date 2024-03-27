<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    public function followList(){
        $follows = DB::table('follows')
            ->join('users','follows.follow','=','users.id')
            ->where('follower','=', Auth::id())
            ->get();
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follow','=','users.id')
            ->where('follows.follower','=', Auth::id())
            ->select('posts.created_at','posts','posts.user_id','users.username','follows.follow','images')
            ->get();
        return view('follows.followList', ['follows'=>$follows, 'posts'=>$posts]);
    }
    
    public function followerList(){
        $followers = DB::table('follows')
            ->join('users','follows.follower','=','users.id')
            ->where('follow','=', Auth::id())
            ->get();
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follower','=','users.id')
            ->where('follows.follow','=', Auth::id())
            ->select('posts.created_at','posts','posts.user_id','users.username','follows.follower','images')
            ->get();      
        return view('follows.followerList', ['followers'=>$followers, 'posts'=>$posts]);
    }

    public function add(Request $request){
        $user_id =$request->input('id');
        DB::table('follows')->insert([
            'follow' =>$user_id,
            'follower' =>Auth::id(),
            'created_at' => now()
        ]);
        return back();
    }

    public function remove(Request $request){
        $user_id = $request->input('id'); 
        DB::table('follows')
            ->where('follow',$user_id)
            ->where('follower',Auth::id())
            ->delete();
        return back();
    }
}
