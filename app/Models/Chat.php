<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image_url', 'is_group'
    ];

    //Relación uno a muchos
    public function message(){
        return $this->hasMany(Message::class);
    }

    //Relación muchos a muchos
    public function users(){
        return $this->belongsToMany(User::class);
    }

}
