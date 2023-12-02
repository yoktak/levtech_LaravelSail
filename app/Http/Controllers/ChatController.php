<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chatroom;

class ChatController extends Controller
{
    public function select () {
        $chats = Auth::user()->chatrooms;

        return view("chat.select")->with(["chats" => $chats]);
    }

    public function room (Chatroom $chatroom) {
        return view('chat.room')->with(['chatroom' => $chatroom]);
    }
}
