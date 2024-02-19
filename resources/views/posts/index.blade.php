@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
    </div>
    <button type="submit" class="btn btn-success pull-right">追加</button>
{!! Form::close() !!}

@foreach ($posts as $post)
    <div>
        {{ $post->id }}
        {{ $post->posts }}
        {{ $post->created_at }}

        {!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $post->id) !!}
            {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}

        <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
    </div>
@endforeach

@endsection