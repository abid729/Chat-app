<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageStatus extends Model
{
    use HasFactory;
    protected $table = "message_statuses";
    public function messages()
    {
        // return $this->belongsTo(App\Employee::class);
        return $this->belongsTo('App\Message');
    }
}
