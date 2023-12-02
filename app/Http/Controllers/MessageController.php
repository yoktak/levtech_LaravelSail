<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Chatroom;

class MessageController extends Controller
{
    public function selectRoom () 
    {
        $users = User::where('id', '<>', Auth::id())->get();
        return view('chat.select')->with(['users' => $users]);
    }

    public function room () 
    {
        return view('chat.message');
    }

    public function newMessage (Message $message, Request $request)
    {
        $message->message = $request->message;
        $message->chatroom_id = $request->chatroom_id;
        $message->user_id = Auth::id();
        $message->save();

        //イベント発動
        //新しいメッセージをpusherに
        event(new MessageSent([$message,Auth::user()]));
    }
    
    // //最初にアクセスした時、全メッセージを返す
    public function allMessage(Request $request)
    {
        $messages = Message::where('chatroom_id', $request->chatroom_id)->with('user')->get();
        return $messages;
    }
}
