<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, softDeletes;

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id')->withDefault();
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id')->withDefault();
    }

}
