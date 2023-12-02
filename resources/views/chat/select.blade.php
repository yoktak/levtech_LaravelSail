<x-app-layout>
    <x-slot name='title'>
        select chat room
    </x-slot>
    <x-slot name="header">
        select chat room
    </x-slot>
    <body>
        <div class="py-8">
            @foreach($chats as $chat)
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex">
                                <div class='icon w-14 h-14 rounded-full overflow-hidden'>
                                    @if($chat->partner()->icon_url)
                                    <img src="{{ $chat->partner()->icon_url }}" class="object-cover"/>
                                    @else
                                    <img src="{{ asset('img/unselect.webp') }}" class="object-cover"/>
                                    @endif
                                </div>
                                <div class="id ml-8">
                                    {{ $chat->id }}
                                </div>
                                <div class="name ml-8">
                                    {{ $chat->partner()->name }}
                                </div>
                                <div class="flex items-center ml-auto">
                                    <a href="/chatroom/{{ $chat->id }}">
                                        <buttom class="bg-blue-400 hover:bg-blue-300 text-white rounded px-4 py-2">
                                            chat
                                        </buttom>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </body>
</x-app-layout>