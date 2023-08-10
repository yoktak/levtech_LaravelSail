<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/posts/index.css') }}">
        
        <title>投稿一覧</title>

    </head>
    <body>
        <form action='/posts/store' method='POST'>
            @csrf
            <div class='title'>
                <h1>「タイトル」</h1>
                <input type='text' name='post[title]'>
            </div>
            <div class='body'>
                <h1>一言</h1>
                <textarea name='post[body]'></textarea>
            </div>
            <div class='submit'>
                <button type='submit'>投稿</button>
            </div>
        </form>
    </body>
</html>
