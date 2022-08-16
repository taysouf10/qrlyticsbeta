<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function links(){
        return $this->hasMany(Link::class);
    }

    public function scans()
    {
        return $this->hasManyThrough(Visit::class, Link::class);
    }
}
