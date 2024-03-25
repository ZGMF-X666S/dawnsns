@extends('layouts.login')

@section('content')


    
    <img src="/images/{{$user->images}}" alt="{{$user->images}}">
        {{ $user->username }}
        {{ $user->bio }}
        @if($followings->contains($user->id))
            {!! Form::open(['url' => '/remove-follower']) !!}
            {!! Form::hidden('id',$user->id)!!}
            {!! Form::submit('フォローをはずす', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['url' => '/add-follow']) !!}
            {!! Form::hidden('id',$user->id)!!}
            {!! Form::submit('フォローする', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        @endif

        @foreach ($posts as $post)
        <div>
        <img src="/images/{{$post->images}}" alt="{{$post->images}}">
        {{ $post->username }}
        {{ $post->posts }}
        {{ $post->created_at }}
        </div>
    @endforeach

@endsection