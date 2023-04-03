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
      $chathead = DB::table('conversations as c')
      ->leftJoin('conversation_user as cu', 'c.id', '=', 'cu.conversation_id')
      ->leftJoin('users as u', 'u.id', '=', 'cu.user_id')
      ->leftJoin('conversation_group as cg', 'c.id', '=', 'cg.conversation_id')
      ->leftJoin('groups as g', 'g.id', '=', 'cg.group_id')
      ->where('c.conversation_type', '=', 'private')
      ->orWhere(function($query) {
          $query->where('c.conversation_type', '=', 'group')
                ->whereIn('g.id', function($subquery) {
                      $subquery->select('gu.group_id')
                               ->from('group_user as gu')
                               ->where('gu.user_id', '=', 1);
                });
      })
      ->orderBy('c.updated_at', 'DESC')
      ->select('c.id as conversation_id', 'u.name as chat_head_name', 'g.name as group_name','u.image as chat_head_image', 'g.image as group_image')
      ->get();

    //  $chats =  DB::table('messages')
    //  ->latest()
    //  ->limit(3)
    //  ->get()
    //  ->reverse();
    
    $messages = Message::with('messageStatuses') ->latest()
    ->limit(3)
    ->get()
    ->reverse();
    // dd($messages = Message::with('messageStatuses') ->latest()
    // ->limit(3)
    // ->get()
    // ->reverse());
    // dd($messages);
    // return $messages;
// $messageStatuses = $message->messageStatuses;
//     //  dd($messageStatuses);
//   foreach($chats as $statuses){
//     $statuses = $chats->messageStatuses;
//     dd($messageStatuses);
//   }

     return view('chat', compact('chats','messages','chathead'));
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
