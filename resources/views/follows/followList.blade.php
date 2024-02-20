@extends('layouts.login')

@section('content')

<div>
    @foreach ($follows as $follow)    
        <img src="/images/{{$follow->images}}">
        
    @endforeach
    
</div>

<div>

    @foreach ($posts as $post)
        <img src="/images/{{$post->images}}" alt="{{$post->images}}">
        {{ $post->follow }}
        {{ $post->posts }}
        {{ $post->created_at }}
    @endforeach
    

</div>

@endsection