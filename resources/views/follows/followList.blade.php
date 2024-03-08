@extends('layouts.login')

@section('content')


    @foreach ($follows as $follow)   
    
        <img src="/images/{{$follow->images}}">
    
        
    @endforeach
    




    @foreach ($posts as $post)
        <div>
        <img src="/images/{{$post->images}}" alt="{{$post->images}}">
        {{ $post->follow }}
        {{ $post->posts }}
        {{ $post->created_at }}
        </div>
    @endforeach
    

@endsection