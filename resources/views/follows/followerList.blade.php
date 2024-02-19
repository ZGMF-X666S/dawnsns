@extends('layouts.login')

@section('content')

@foreach ($followers as $follower)
    <div>
        {{ $follower->username }}
    </div>
@endforeach


@endsection