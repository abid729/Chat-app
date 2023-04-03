<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(){
     $chats =  DB::table('messages')
     ->latest()
     ->limit(3)
     ->get()
     ->reverse();
    //  $messageStatuses = $chats->message;
    // $message = Message::find(22);
    $messages = Message::with('messageStatuses') ->latest()
    ->limit(3)
    ->get()
    ->reverse();
    // dd($messages = Message::with('messageStatuses') ->latest()
    // ->limit(3)
    // ->get()
    // ->reverse());
// $messageStatuses = $message->messageStatuses;
//     //  dd($messageStatuses);
//   foreach($chats as $statuses){
//     $statuses = $chats->messageStatuses;
//     dd($messageStatuses);
//   }

     return view('chat', compact('chats','messages'));
    }

    public function store(Request $request)
      {
         // Check if internet connection is stable or not
        $connected = @fsockopen("www.google.com", 80);
        $message = new Message;
        $message_statuses = new MessageStatus; 
        $message->conversation_id  = 1;
        $message->sender_id  = 1;
        $message->type = $message->getMessageType($request->message);
        $message->message = $request->message;
        $message->save();
        $last_id = $message->id;
        $message_statuses->message_id = $last_id;
        $message_statuses->user_id = 1;

        if($connected){
          fclose($connected);
          $message_statuses->status = 'delivered';
         }
         else{
         $message_statuses->status = 'sent';
        }

        $message_statuses->save();
        return redirect()->route('chat.index')->with('success','Chat has been created successfully.');
      }

      public function checkInternetConnection(Request $request)
    {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            fclose($connected);
            return response()->json(['status' => 'delivered']);
        } else {
            return response()->json(['status' => 'undelivered']);
        }
    }
}
