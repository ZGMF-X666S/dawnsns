<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use count;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')->get();
        $follow_count = DB::table('follows')
        ->where('follower',Auth::id())
        ->count();

        $follower_count = DB::table('follows')
        ->where('follow',Auth::id())
        ->count();


        // dd($follow_count);
    return view('posts.index', ['posts'=>$posts, 'follow_count'=>$follow_count ,'follower_count'=>$follower_count]);
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
