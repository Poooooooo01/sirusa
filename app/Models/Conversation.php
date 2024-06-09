<?php

// app/Models/Conversation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['consultation_id', 'message', 'sender'];
}

