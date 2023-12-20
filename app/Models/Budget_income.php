<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget_income extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'budget_incomes';
    protected $fillable = [
        'income_id',
        'budget_id',
        'amount',
        'income_date'
    ];

}
