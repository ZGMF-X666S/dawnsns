@extends('layouts.login')

@section('content')


    @foreach ($follows as $follow)   
    {!! Form::open(['url' => '/otherProfile']) !!}
                            <div class="form-group">
                                {!! Form::hidden('id', $follow->id) !!}
                            </div>
                            <input type="image" class="btn btn-primary pull-right" src="/images/{{$follow->images}}">                        
    {!! Form::close() !!}    
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