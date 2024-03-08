<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $request->validate([
                'username' => 'required|string|min:4|max:12',
                'mail' => 'required|string|min:4|max:12|email',
                'password' => 'required|string|min:4|max:12|confirmed',

                
            ],[
                'username.required' => '名前は必須です',
                'username.min' => '名前は４文字以上でお願いします。',
                'username.max' => '名前は１２文字以内でお願いします。',
                'mail.required' => 'メールアドレスは必須です。',
                'mail.min' => 'メールアドレスは４文字以上です。',
                'mail.max' => 'メールアドレスは１２文字以内です。',
                'mail.email' => 'メールアドレスは英数字です。',
                'password.required' => 'パスワードは必須です。',
                'password.min' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.max' => 'パスワードは４文字以上１２文字以内でお願いします。',
                'password.confirmed' => 'パスワードが一致しません。'

            ]);
            $this->create($data);
            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }


}
