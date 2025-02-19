<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'recurring','number_installments', 'category_id', 'pot_id','user_id'];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function pot()
    {
        return $this->belongsTo(Pot::class);
    }
}
