@extends('layouts.login')

@section('content')
    @foreach ($users as $user)
    <img src="/images/{{$user->images}}" alt="{{$user->images}}">
        {{ $user->username }}
        {{ $user->created_at }}
    @endforeach        

@endsection