@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

@if ($errors->has('username'))
  <li>{{$errors->first('username')}}</li>
@endif

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

@if ($errors->has('mail'))
  <li>{{$errors->first('mail')}}</li>
@endif

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

@if ($errors->has('password'))
  <li>{{$errors->first('password')}}</li>
@endif

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

@if ($errors->has('password-confirm'))
  <li>{{$errors->first('password-confirm')}}</li>
@endif

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}


{{ Form::submit('登録') }}




<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
