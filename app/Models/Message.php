<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
   
    public function messageStatus()
    {
        return $this->hasOne(MessageStatus::class);
    }
    public function statuses()
    {
        return $this->hasMany(MessageStatus::class);
    }
    public function getMessageType($message) {
        // Check if the message is an emoji
        if (preg_match('/[\x{1F600}-\x{1F64F}]/u', $message)) {
            return 'emoji';
        }
        // Check if the message is an image
        if (preg_match('/\.(png|jpg|jpeg|gif)$/', $message)) {
            return 'image';
        }
    
        // The message is assumed to be text if it's not an emoji or image
        return 'text';
    }
}
