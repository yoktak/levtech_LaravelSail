<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
