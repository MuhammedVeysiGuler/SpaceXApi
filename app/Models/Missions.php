<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    use HasFactory;

    protected $hidden=[
        'id',
        'created_at',
        'updated_at',
        'capsule_id',
    ];
    function getCapsule(){
        return $this->belongsTo("App\Models\Capsules", 'capsule_id', 'id');
    }
}
