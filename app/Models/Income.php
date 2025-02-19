<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'period_id', 'recurring', 'category_id','user_id'];

    public function category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
