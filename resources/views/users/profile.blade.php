@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'userupdate' , "enctype" => "multipart/form-data"]) !!}
    <div>
        @if ($errors->has('username'))
        <li>{{$errors->first('username')}}</li>
        @endif
        {{ Form::label('ユーザー名') }}
        {{ Form::input('text', 'username', $users->username, ['required', 'class' => 'form-control'])}}
    </div>
    <div>
        @if ($errors->has('mail'))
            <li>{{$errors->first('mail')}}</li>
        @endif
        {{ Form::label('メールアドレス') }}
        {{ Form::email('mail', $users->mail, ['class' => 'form-control','id' => 'inputEmail','placeholder' => 'Eメール'])}}
    </div>
    <div>
        
        {{ Form::label('現在のパスワード') }}
        {{ Form::input('text','','●●●●●●●', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
    </div>
    <div>
    @if ($errors->has('password'))
            <li>{{$errors->first('password')}}</li>
        @endif
        {{ Form::label('新しいパスワード') }}
        {{ Form::input('text','password','', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
    </div>
    <div>
        @if ($errors->has('bio'))
            <li>{{$errors->first('bio')}}</li>
        @endif
        {{ Form::label('自己紹介') }}
        {!! Form::hidden('id', $users->id) !!}
        {!! Form::input('text', 'bio', $users->bio, ['class' => 'form-control']) !!}
    </div>
    <div>
        {{ Form::label('画像') }}
        
        <input id="image" type="file" name="image">
        
    </div>
       

    <button type="submit" class="btn btn-success pull-right">更新</button>

{!! Form::close() !!} 





@endsection