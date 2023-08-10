<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/posts/show.css') }}">
        
        <title>投稿詳細</title>

    </head>
    <body>
        <a href='/posts/edit/{{ $post->id }}'>
            <div class='post'>
                <div class='poster'>
                    <p>{{ $post->user->name }}</p>
                </div>
                <div class='title'>
                    <h1>「{{ $post->title }}」</h1>
                </div>
                <div class='body'>
                    <h3>{{ $post->body }}</h3>
                </div>
            </div>
        </a>
        <a href='/posts'>
            <div class='back'>
                <button>一覧画面</button>
            </div>
        </a>
        <form action="/posts/delete/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
        </form>
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
