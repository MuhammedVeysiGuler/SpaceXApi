<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capsules extends Model
{
    use HasFactory;


    protected $hidden = [
        'id',
    ];
    function missions(){
        return $this->hasMany("App\Models\Missions", 'capsule_id', 'id');
    }
}
