
    <body>
        <div class='post'>
            <form action='/posts/update/{{ $post->id }}' method='POST'>
                @csrf
                @method('PUT')
                <div class='poster'>
                    <p>{{ $post->user->name }}</p>
                </div>
                <div class='title'>
                    <h1>「<input type='text' name='post[title]' value='{{ $post->title }}'>」</h1>
                </div>
                <div class='body'>
                    <textarea name='post[body]' rows=1 cols=50>{{ $post->body }}</textarea>
                </div>
                <div class='submit'>
                    <button type='submit'>完了</button>
                </div>
            </form>
            </div>
    </body>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <form action='/posts/update/{{ $post->id }}' method='POST'>
                            @csrf
                            @method('PUT')
                            <div class='poster'>
                                <p>{{ $post->user->name }}</p>
                            </div>
                            <div class='title'>
                                <h1>「<input type='text' name='post[title]' value='{{ $post->title }}'>」</h1>
                            </div>
                            <div class='body'>
                                <textarea name='post[body]' rows=1 cols=50>{{ $post->body }}</textarea>
                            </div>
                            <div class='submit'>
                                <button type='submit'>完了</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
