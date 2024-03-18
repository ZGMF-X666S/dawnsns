@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        
        {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
        <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="edit.png"></button>

        </a>
    </div>

{!! Form::close() !!}


@foreach ($posts as $post)

    <div>
        {{ $post->id }}
        {{ $post->posts }}
        {{ $post->created_at }}
        <div class="modal-main js-modal" id="modal01">
            <div class="modal-inner">
                <div class="inner-content">
                    <div class ="textbox vallue">
                        'つぶやいた内容を表示します'
                        {!! Form::open(['url' => '/post/update']) !!}
                            <div class="form-group">
                                {!! Form::hidden('id', $post->id) !!}
                                {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">更新</button>
                        {!! Form::close() !!}
                        <a class="send-button modalClose">Close</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modalopen" data-target="modal01">
            <div class = "btn btn-primary pull-right">
                <img src="images/edit.png" alt="edit.png">          
            </div>
        </div>
        <div>
            <a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash_h.png" alt="trach_h.png"></a>
        </div>
    </div>
@endforeach

@endsection