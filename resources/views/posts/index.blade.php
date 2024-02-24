<x-app-layout>
    <x-slot name='title'>
        index
    </x-slot>
    <x-slot name="header">
        index
    </x-slot>
    <body>
        <div class="search">
            <div class="pt-8 pb-4">
                <form action="/posts" method="GET">
                    @csrf
                    <div class="flex justify-end max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <input type="text" name="keyword" class="rounded-md w-20em border-slate-300">
                        <input type="submit" value="検索" class="mx-2 px-4 bg-blue-400 hover:bg-blue-300 text-white rounded-md">
                    </div>
                </form>
            </div>
        </div>
        <div class="create">
            <div class="container mx-auto p-6 text-center">
                <div class="mt-6" x-data="{ open: false }" x-cloak>
                    <button class="bg-white bg-opacity-75 p-6 text-slate-400 rounded shadow-sm" @click="open = true">何したの？</button>
                    <div class="fixed top-0 left-0 w-full h-full flex" style="background-color: rgba(0,0,0,.5);" x-show="open">
                        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 " @click.away="open = false">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-show="open" x-transition>
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <form action='/posts/store' method='POST'>
                                        @csrf
                                        <div>
                                            <div class='title'>
                                                <input type='text' name='post[title]' size=100 class='my-1 p-4 rounded border-none w-full text-2xl' placeholder="たいとる">
                                            </div>
                                            <div class='body'>
                                                <textarea name='post[body]' size=100 class='my-1 p-4 rounded border-gray-300 resize-none border-none w-full' placeholder="今日のできごと"></textarea>
                                            </div>
                                        </div>
                                        <div class='submit flex justify-end border-t-2 pt-4'>
                                            <input type='submit' value="ポスト" class="px-4 py-2 bg-blue-400 hover:bg-blue-300 text-white rounded-md">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="posts">
            @foreach($posts as $post)
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ open: false }" x-cloak>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class='post' @click="open = true">
                                <div class='container flex justify-between'>
                                    <div class='poster flex'>
                                        <div class='icon w-14 h-14 rounded-full overflow-hidden'>
                                            @if($post->user->icon_url)
                                            <img src="{{ $post->user->icon_url }}" class="object-cover"/>
                                            @else
                                            <img src="{{ asset('img/unselect.webp') }}" class="object-cover"/>
                                            @endif
                                        </div>
                                        <div class='name m-4'>
                                            <p>{{ $post->user->name }}</p>
                                        </div>
                                    </div>
                                    <div class='daytime'>
                                        <p>{{ $post->updated_at->format('Y年m月d日') }}</p>
                                    </div>
                                </div>
                                <div class='title m-4'>
                                    <h4>「{{ $post->title }}」</h4>        
                                </div>
                                <div class='body m-4 pl-4'>
                                    <h5>{{ $post->body }}</h5>    
                                </div>
                            </div>
                            <div class='like m-4'>
                                @if($post->likeIs($post))
                                <span class="likes">
                                    <i class="fas fa-heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{ $post->likes_count }}</span>
                                </span>
                                @else
                                <span class="likes">
                                    <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                                    <span class="like-counter">{{ $post->likes_count }}</span>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="fixed top-0 left-0 w-full h-full flex" style="background-color: rgba(0,0,0,.5);" x-show="open">
                        <div class="max-w-7xl m-auto sm:px-6 lg:px-8 " @click.away="open = false">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-show="open" x-transition>
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <form action='/posts/update/{{ $post->id }}' method='POST'>
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <div class='title'>
                                                <input type='text' name='post[title]' size=100 class='my-1 p-4 rounded border-none w-full text-2xl' value='{{ $post->title }}' placeholder="たいとる">
                                            </div>
                                            <div class='body'>
                                                <textarea name='post[body]' size=100 class='my-1 p-4 rounded border-gray-300 resize-none border-none w-full' placeholder="今日のできごと">{{ $post->body }}</textarea>
                                            </div>
                                        </div>
                                        <div class='submit flex justify-end border-t-2 pt-4'>
                                            <input type='submit' value="ポスト" class="px-4 py-2 bg-blue-400 hover:bg-blue-300 text-white rounded-md">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <style>
            [x-cloak] {
                display: none;
            }
        </style>
    </body>
</x-app-layout>
