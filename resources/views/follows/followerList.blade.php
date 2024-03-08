@extends('layouts.login')

@section('content')



    @foreach ($followers as $follower)    
        <img src="/images/{{$follower->images}}">
    @endforeach




    @foreach ($posts as $post)
    <div>
        <img src="/images/{{$post->images}}" alt="{{$post->images}}">
        {{ $post->follower }}
        {{ $post->posts }}
        {{ $post->created_at }} 
    </div>
    @endforeach
    






@endsection