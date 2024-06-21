@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
    <div class="form-group">
        {!! Form::input('text', 'newPost', null,['maxlength'=>'150', 'required', 'placeholder' => '投稿内容']) !!}
        <button type="submit"><img src="images/post.png" alt="edit.png"></button>
    </div>

{!! Form::close() !!}


@foreach ($posts as $post)

    <div>
        {{ $post->id }}
        {{ $post->posts }}
        {{ $post->created_at }}

        @if(Auth::id() === $post->user_id)
        <div class="modal-main js-modal" id="modal01">
            <div class="modal-inner">
                <div class="inner-content">
                    <div class ="textbox vallue">       
                        {!! Form::open(['url' => '/post/update']) !!}
                            <div class="form-group">
                                {!! Form::hidden('id', $post->id) !!}
                                {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary pull-right"><img src="images/edit.png" alt="edit.png"></button>    
                        {!! Form::close() !!}
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
            <a class="btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png" onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'" alt="trash_h.png"></a>
        </div>
        @else


        @endif
    </div>

@endforeach

@endsection