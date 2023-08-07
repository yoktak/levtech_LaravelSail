<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/posts/show.css') }}">
        
        <title>投稿詳細</title>

    </head>
    <body>
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
        <a href='/posts'>
            <div class='back'>
                <button>一覧画面</button>
            </div>
        </a>
    </body>
</html>
