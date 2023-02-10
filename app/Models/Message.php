<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body', 'is_read', 'user_id', 'chat_id'
    ];

    //Relación uno a muchos inversa
    public function chat(){
        return $this->belongsTo(Chat::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
