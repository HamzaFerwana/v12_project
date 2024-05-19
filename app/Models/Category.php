<?php

namespace App\Models;

use App\Models\Project;
use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;

class Category extends Model
{
    use HasFactory, softDeletes,Trans;


protected $fillable = [
    'name',
    'slug'
];




    public function projects() {
      return $this->hasMany(Project::class);

    }
}
