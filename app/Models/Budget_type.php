<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget_type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'budget_types';
    protected $fillable = [
        'type_id',
        'type_name'
    ];

}
