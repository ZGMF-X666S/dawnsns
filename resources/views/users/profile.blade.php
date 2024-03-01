@extends('layouts.login')

@section('content')
{!! Form::open(['url' => 'profile']) !!}
    <div class="form-group">
        {{ Form::input('text', 'username', null, ['required', 'class' => 'form-control', 'placeholder' => 'Username'])}}
    </div>
    <div class="form-group">
        {{ Form::email('mail', null, ['class' => 'form-control','id' => 'inputEmail','placeholder' => 'Eメール'])}}
    </div>
    <div class="form-group">
        現在のパスワード
        {{ Form::input('text','','●●●●●●●', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
    </div>
    <div class="form-group">
        新しいパスワード
    {{ Form::input('text','password','', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
    </div>
    
    <button type="submit" class="btn btn-success pull-right">更新</button>
{!! Form::close() !!} 





@endsection