<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //
    public function profile(Request $request){
        $users = DB::table('Users')
        ->where('id',Auth::id())
        ->first();       
        return view('users.profile',['users'=>$users]);
    }

    public function userupdate(Request $request)
    {
        //dd($request);
            $id = $request->input();
            $request->validate([
                'username' => 'string|min:4|max:12',
                'mail' => ['required',
                Rule::unique('users')->ignore(Auth::id()),'min:4','max:30','email'],
                'password' => 'string|min:4|max:12',
                'bio' => 'string|max:200',
                

                
            ],[
                
                'username.min' => '名前は４文字以上でお願いします。',
                'username.max' => '名前は１２文字以内でお願いします。',

                'mail.min' => 'メールアドレスは４文字以上です。',
                'mail.max' => 'メールアドレスは１２文字以内です。',
                'mail.email' => 'メールアドレスは英数字です。',

                'password.min' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.max' => 'パスワードは４文字以上１２文字以内でお願いします。',
                

                'bio.max' => '200文字までです。'


            ]);

        
        
            
        $id = $request->input('id');
        // $up_username = $request->input('username');
        // $up_users = $request;
        // $up_users = [];
        // $up_users['username'] = $request->username;
        // $up_users['mail'] = $request->mail;
        // dd($up_users);
        $up_username = $request -> input('username');
        $up_mail = $request -> input('mail');
        // dd($up_mail);
        $up_password = $request -> input('password');
        $up_bio = $request -> input('bio');
        $up_image = $request -> input('images');

        if(request('image')){
            $filename=$request->file('image')->getClientOriginalName();
            $inputs['image']=request('image')->storeAs('public/images', $filename);
        }


        DB::table('users')
            ->where('id', $id)
            ->update([
            'username' => $up_username,
            'mail' => $up_mail,
            'password' =>bcrypt($up_password),
            'bio' => $up_bio,
            'images' => $request->file('image')->getClientOriginalName()
            
            ]);
            
        return redirect('/profile');
    }

    public function profileregister(Request $request){
        if($request->isMethod('post')){
            $id = $request->input();
            $request->validate([
                'username' => 'string|min:4|max:12',
                'mail' => ['required',
                Rule::unique('users')->ignore($id->Auth::id()),'min:4','max:30','email'],
                'password' => 'string|min:4|max:12|confirmed',
                'bio' => 'string|max200',

                
            ],[
                
                'username.min' => '名前は４文字以上でお願いします。',
                'username.max' => '名前は１２文字以内でお願いします。',

                'mail.min' => 'メールアドレスは４文字以上です。',
                'mail.max' => 'メールアドレスは１２文字以内です。',
                'mail.email' => 'メールアドレスは英数字です。',

                'password.min' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.max' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.confirmed' => 'パスワードが一致しません。'

            ]);
            $this->create($id);
            return redirect('added');
        }
        return view('users.profile');
    }





    public function search(Request $request){
        $keyword = $request->input('newSearch');
        // dd($keyword);
        if(isset($keyword)){
            $users = DB::table('users')
                ->where('username', 'LIKE', "%".$keyword."%")
                ->where('id','!=',Auth::id())
               // ->select('images',)
                ->get();
                // dd($users);
        }else{
            $users = DB::table('users')
                ->where('id','!=',Auth::id())
                // ->select('images',)
                ->get();
                // dd($users);
        } 

    return view('users.search',['users'=>$users, 'keyword'=>$keyword]);

    }
}
