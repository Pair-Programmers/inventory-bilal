<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_date',
        'amount',
        'note',
        'images',
        'expense_category_id',
        'account_id',
        'created_by',
    ];

    public function category()
    {
        return $this->hasOne(ExpenseCategory::class, 'id', 'expense_category_id');
    }

    public function creator()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }

    public function account()
    {
        return $this->hasOne(Account::class, 'id', 'account_id');
    }


}
