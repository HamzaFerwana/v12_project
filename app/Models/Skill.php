<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{

    protected $fillable = ['name', 'slug'];
    use HasFactory, softDeletes, Trans;


    public function project() {
        return $this->belongsToMany(Project::class);

      }
}
