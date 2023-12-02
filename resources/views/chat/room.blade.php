<x-app-layout>
    <x-slot name='title'>
        chat
    </x-slot>
    <x-slot name="header">
        chat
    </x-slot>
    <body>
        <div>
            {{ $chatroom->id }}
        </div>
        <div>
            @foreach($chatroom->users as $user)
            <div>
                {{$user->name}}
            </div>
            @endforeach
        </div>
        <div id="message_area"></div>
        <div class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-300 p-4">
            <div class="flex items-center">
                <input id='message' type="text" placeholder="Type your message..." class="w-full px-4 py-2 mr-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                <input id='chatroom' type="hidden" value={{ $chatroom->id }}>
                <button id='submit' class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 focus:outline-none">Send</button>
            </div>
        </div>
    </body>
</x-app-layout>
