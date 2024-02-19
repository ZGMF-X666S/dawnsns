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
        //  dd($follows);
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follow','=','users.id')
            ->where('follows.follower','=', Auth::id())
            // ->select('posts.created_at','posts','posts.user_id','users.username','follows.follow')
            ->get();
            //  dd($posts);

        return view('follows.followList', ['follows'=>$follows, 'posts'=>$posts]);
    }
    public function followerList(){
        $followers = DB::table('follows')
        ->join('users','follows.follower','=','users.id')
        ->where('follow','=', Auth::id())
        ->get();
    //dd);
    return view('follows.followerList', ['followers'=>$followers]);
        return view('follows.followerList');
    }


}
