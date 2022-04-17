<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manager',
        'ruc',
        'address',
        'phone',
        'location_iframe',
    ];

    public function grounds()
    {
        return $this->hasMany(Ground::class);
    }

    protected static function newFactory()
    {
        //return \Modules\User\Database\factories\CompanyFactory::new();
    }
}
