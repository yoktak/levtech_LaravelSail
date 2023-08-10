<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/posts/edit.css') }}">
        
        <title>投稿編集</title>

    </head>
    <body>
        <form action='/posts/update/{{ $post->id }}' method='POST'>
            @csrf
            @method('PUT')
            <div class='title'>
                <h1>「タイトル」</h1>
                <input type='text' name='post[title]' value='{{ $post->title }}'>
            </div>
            <div class='body'>
                <h1>一言</h1>
                <textarea name='post[body]'>{{ $post->body }}</textarea>
            </div>
            <div class='submit'>
                <button type='submit'>投稿</button>
            </div>
        </form>
    </body>
</html>
