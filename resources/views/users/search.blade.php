@extends('layouts.login')

@section('content')
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::input('text', 'newSearch', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">検索</button>
{!! Form::close() !!}




    @if(isset($keyword))
        検索ワード：{!!$keyword!!}
    @endif



    @foreach ($users as $user)
    <img src="/images/{{$user->images}}" alt="{{$user->images}}">
        {{ $user->username }}
        {{ $user->created_at }}

        {!! Form::open(['url' => '/add-follow']) !!}
        {!! Form::hidden('id',$user->id)!!}
        {!! Form::submit('フォローする', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}


        {!! Form::open(['url' => '/remove-follower']) !!}
        {!! Form::hidden('id',$user->id)!!}
        {!! Form::submit('フォローをはずす', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    
    @endforeach        
    




@endsection