<?php

namespace App\Http\Controllers;
use Jenssegers\Agent\Agent;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\MessageStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
    //   $agent = new Agent();
    //   $device = $agent->device();
    //   $platform = $agent->platform();
    //   $browser = $agent->browser();
    // dd($browser);
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
                               ->where('gu.user_id', '=', Auth::user()->id);
                });
      })
      ->orderBy('c.updated_at', 'DESC')
      ->select('c.id as conversation_id', 'u.name as chat_head_name', 'g.name as group_name','u.image as chat_head_image', 'g.image as group_image')
      ->get();
   
    $chats =  Message::with('messageStatus')
    ->latest()
    ->limit(5)
    ->get()
    ->reverse();
    
     return view('chat', compact('chats','chathead'));
    }

    public function store(Request $request)
      {
         // Check if internet connection is stable or not
        $connected = @fsockopen("www.google.com", 80);
        $message = new Message;
        $message_statuses = new MessageStatus; 
        $message->conversation_id  = 1;
        $message->sender_id  = Auth::user()->id;
        $message->type = $message->getMessageType($request->message);
        $message->message = $request->message;
        $message->save();
        $last_id = $message->id;
        $message_statuses->message_id = $last_id;
        $message_statuses->user_id = Auth::user()->id;

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
    public function markAsRead($id)
    {
      $message = Message::findOrFail($id);

      $message->statuses()
          ->where('user_id' != Auth::user()->id)
          ->update(['status' => 'read']);

      return response()->json(['success' => true]);
    }
}
