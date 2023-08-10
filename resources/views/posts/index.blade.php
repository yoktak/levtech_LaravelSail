<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('/css/posts/index.css') }}">
        
        <title>投稿一覧</title>

    </head>
    <body class="posts">
        <h1>にて日記</h1>
        <div class='create'>
            <a href='/posts/create'><button>+</button></a>
        </div>
        @foreach($posts as $post)
        <a href="posts/{{ $post->id }}">
            <div class='post'>
                <div class='poster'>
                    <p>{{ $post->user->name }}</p>
                </div>
                <div class='daytime'>
                    <p>{{ $post->updated_at }}</p>
                </div>
                <div class='title'>
                    <h4>「{{ $post->title }}」</h4>        
                </div>
                <div class='body'>
                    <h5>{{ $post->body }}</h5>    
                </div>
            </div>
        </a>
        @endforeach
    </body>
</html>
