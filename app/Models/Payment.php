<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_date',
        'group',
        'type',
        'note',
        'invoice_id',
        'expense_id',
        'vendor_id',
        'customer_id',
        'employee_id',
        'account_id',
        'created_by',
    ];

    public function creator()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }
}
