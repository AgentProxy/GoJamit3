<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\User;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    function getMessages() {
        $messages = Auth::user()->getMessages();
    	return view('communication.messages', compact('messages'));
    }

    function sentMessages() {
        $messages = Auth::user()->sentMessages();
        return view('communication.sent', compact('messages'));
    }

    function sendMessage(Request $request) {
       
        $user = User::whereFname($request->messageTo)->first();
        $content = $request->messageContent;
        $receiver_id = $user->id;

        
        $allmessage = Message::all()->first();

        $message1 = Message::where('receiver_id', '=', $receiver_id)->where('sender_id', '=', Auth::user()->id)->first();
        $message2 = Message::where('receiver_id', '=', Auth::user()->id)->where('sender_id', '=', $receiver_id)->first();

        


        if ($message1 === null && $message2 === null) {
            if($allmessage === null) {
                $conversation_num = 1;
            }
            else {
                $conversation_num = DB::table('messages')->max('conversation_num');
                     $conversation_num+=1;
            }
           
        }
        else {
            $conversation_num = $message1->conversation_num;
        }

     
    	Message::create([
    		'content'=>$content,
    		'sender_id'=>Auth::user()->id,
    		'receiver_id'=>$receiver_id,
    		'seen'=>'0',
            'conversation_num'=>$conversation_num,
    	]);

    }

    function getConversation($conversation_num) {
    	$conversations = Auth::user()->getConversation($conversation_num);
        $one = $conversations->first();
    	return view('communication.conversation', compact('conversations', 'one'));
    }

    function sendConversation(Request $request) {
        
        Message::create([
            'content'=>$request->messageContentConvo,
            'sender_id'=>Auth::user()->id,
            'receiver_id'=>$request->messageToConvo,
            'seen'=>'0',
            'conversation_num'=>$request->conversation_num,
        ]);

        return redirect('messages/'.$request->conversation_num);

    }


}
