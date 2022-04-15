<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ground extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image'
    ];
    
    protected static function newFactory()
    {
        //return \Modules\User\Database\factories\GroundFactory::new();
    }
}
