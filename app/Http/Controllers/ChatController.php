<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    function sendMessage(Request $request){
        $user1 = $request->user1;
        $user2 = $request->user2;
        $message = $request->message;
        event(new ChatEvent($user1,$user2,$message));
        return 'true';
    }
}
