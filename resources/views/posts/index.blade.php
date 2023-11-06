<x-app-layout>
    <x-slot name='title'>
        index
    </x-slot>
    <x-slot name="header">
        index
    </x-slot>
    <body class="posts">
        @foreach($posts as $post)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="/posts/{{ $post->id }}">
                            <div class='post'>
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
                        </a>
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
            </div>
        </div>
        @endforeach
    </body>
</x-app-layout>
