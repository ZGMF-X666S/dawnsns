<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','follows.follow','=','users.id')
            ->where('follows.follower','=', Auth::id())
            ->orWhere('posts.user_id','=',Auth::id())
            ->select('posts.created_at','posts','posts.user_id','users.username','follows.follow','images','posts.id')
            ->get();
        return view('posts.index', ['posts'=>$posts ]);
    }

    public function create(Request $request){
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'user_id'=>Auth::id(),
            'posts' => $post,
            'created_at' => now(),
            'updated_at' => now()
        ]);
 
        return redirect('/top');
    }

    public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
 
        return redirect('/top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post]
            );
        return redirect('/top');
    }

}
