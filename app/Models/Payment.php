<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, softDeletes;

    public function employer() {
        $this->belongsTo(User::class, 'employer_id')->withDefault();
    }


    public function proposal(){
        $this->belongsTo(Proposal::class, 'proposal_id')->withDefault();
    }
}
