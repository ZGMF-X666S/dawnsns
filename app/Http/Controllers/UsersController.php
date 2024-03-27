<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function profile(Request $request){
        $users = DB::table('Users')
        ->where('id',Auth::id())
        ->first();       
        return view('users.profile',['users'=>$users]);
    }

    public function userupdate(Request $request)
    {
        $user = $request->input();
        $id = $request->input('id');
        $up_image = $request -> input('images');

        $request->validate([
            'username' => 'min:4|max:12',
            'mail' => [
            Rule::unique('users')->ignore(Auth::id()),'min:4','max:30','email'],
            'bio' => 'max:200',
            'images' => 'image',
        ],[ 
            'username.min' => '名前は４文字以上でお願いします。',
            'username.max' => '名前は１２文字以内でお願いします。',
            'mail.min' => 'メールアドレスは４文字以上です。',
            'mail.max' => 'メールアドレスは１２文字以内です。',
            'mail.email' => 'メールアドレスは英数字です。',
            'bio.max' => '200文字までです。',
            'images.image' => '画像ファイルを指定してください。',
        ]);

        if(request('password')){
            $request->validate([
                'password' =>'min:4|max:12',
            ],[ 
                'password.min' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.max' => 'パスワードは４文字以上１２文字以内でお願いします。',
            ]);
        }

        if(request('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $inputs['image']=request('image')->storeAs('public/images', $filename);
            DB::table('users')
            ->where('id', $id)
            ->update([
            'images' => $filename
            ]);
        }

        DB::table('users')
            ->where('id', $id)
            ->update([
            'username' => $user['username'],
            'mail' => $user['mail'],
            'password' =>bcrypt($user['password']),
            'bio' => $user['bio'],            
            ]);
   
        return redirect('/profile');
    }

    public function profileregister(Request $request){
        if($request->isMethod('post')){
            $id = $request->input();
            $request->validate([
                'username' => 'min:4|max:12',
                'mail' => [
                    Rule::unique('users')->ignore($id->Auth::id()),'min:4','max:30','email'
                ],
                'password' => 'min:4|max:12|confirmed',
                'bio' => 'max:200',
                'images' => 'image',                
            ],[
                'username.min' => '名前は４文字以上でお願いします。',
                'username.max' => '名前は１２文字以内でお願いします。',
                'mail.min' => 'メールアドレスは４文字以上です。',
                'mail.max' => 'メールアドレスは１２文字以内です。',
                'mail.email' => 'メールアドレスは英数字です。',
                'password.min' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.max' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.confirmed' => 'パスワードが一致しません。',
                'bio.max' => 'プロフィールは２００文字以内です。',
                'images' => '画像ファイルは、jpeg,png,bmp,gif,svgファイルのみ使用できます。',
            ]);
            $this->create($id);
            return redirect('added');
        }
        return view('users.profile');
    }

    public function search(Request $request){
        $keyword = $request->input('newSearch');
        if(isset($keyword)){
            $users = DB::table('users')
                ->where('username', 'LIKE', "%".$keyword."%")
                ->where('id','!=',Auth::id())
                ->get();
        }else{
            $users = DB::table('users')
                ->where('id','!=',Auth::id())
                ->get();
        } 
        $followings = DB::table('follows')
        ->where('follower',Auth::id())
        ->pluck('follow');
        
    return view('users.search',['users'=>$users, 'keyword'=>$keyword, 'followings'=>$followings]);
    }

    public function otherProfile(Request $request){
        $user = DB::table('Users')
            ->where('id',$request->input('id'))
            ->first();       
        $followings = DB::table('follows')
            ->where('follower',Auth::id())
            ->pluck('follow');
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->where('posts.user_id','=', $request->input('id'))
            ->select('posts.created_at','posts','posts.user_id','users.username','images','posts.id')
            ->get();
        return view('users.otherProfile',['user'=>$user,'followings'=>$followings,'posts'=>$posts]);
    }
}
