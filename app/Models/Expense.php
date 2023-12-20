<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'expenses';
    protected $fillable = [
        'id',
        'budget_id',
        'expense_type_id',
        'amount',
        'expense_date'
    ];

}
