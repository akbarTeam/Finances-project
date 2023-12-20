<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'peoples';
    protected $fillable =[
        'person_id',
        'first_name',
        'last_name',
        'father_name',
        'administraion_name',
        'direction_name',
        'rank',
        'address',
        'phone_number'
    ];

}
