<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;

    protected $table = 'incomes';

    protected $fillable = [
        'user_id',
        'income_source_id',
        'amount',
        'accrual_date'
    ];
}
