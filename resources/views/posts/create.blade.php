<x-app-layout>
    <x-slot name='title'>
        create
    </x-slot>
    <x-slot name='header'>
        create
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <body>
                        <form action='/posts/store' method='POST'>
                            @csrf
                            <div class='title'>
                                <h1>タイトル</h1>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
