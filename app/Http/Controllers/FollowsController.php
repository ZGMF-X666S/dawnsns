<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follows = DB::table('follows')
            ->join('users','follows.follow','=','users.id')
            ->where('follower','=', Auth::id())
            ->get();
        // dd($follows);
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follow','=','users.id')
            ->where('follows.follower','=', Auth::id())
            ->select('posts.created_at','posts','posts.user_id','users.username','follows.follow','images')
            ->get();
            //  dd($posts);

        return view('follows.followList', ['follows'=>$follows, 'posts'=>$posts]);
    }
    public function followerList(){
        $followers = DB::table('follows')
            ->join('users','follows.follower','=','users.id')
            ->where('follow','=', Auth::id())
            ->get();
        // dd($followers);
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follower','=','users.id')
            ->where('follows.follower','=', Auth::id())
            ->select('posts.created_at','posts','posts.user_id','users.username','follows.follower','images')
            ->get();
            // dd();
        
    return view('follows.followerList', ['followers'=>$followers, 'posts'=>$posts]);
        return view('follows.followerList');
    }


}
