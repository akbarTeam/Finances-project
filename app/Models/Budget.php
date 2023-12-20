<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'budgets';
    protected $fillable = [
        'id',
        'budget_name',
        'start_date',
        'end_date',
        'user_id',
        'type_id'
    ];
}

