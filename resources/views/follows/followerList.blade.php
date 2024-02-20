@extends('layouts.login')

@section('content')

@foreach ($followers as $follower)
<div>
    @foreach ($followers as $follower)    
        <img src="/images/{{$follower->images}}">
    @endforeach
</div>

<div>

    @foreach ($posts as $post)
        <img src="/images/{{$post->images}}" alt="{{$post->images}}">
        {{ $post->follower }}
        {{ $post->posts }}
        {{ $post->created_at }} 
    @endforeach
    

</div>

@endforeach


@endsection