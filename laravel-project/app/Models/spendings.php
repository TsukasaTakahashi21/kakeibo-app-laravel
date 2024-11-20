<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spendings extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id', 
        'amount',
        'accrual_date',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}


