<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'no_of_items',
        'no_of_products',
        'issue_date',
        'discount',
        'reference_no',
        'description',
        'type',
        'group',
        'cash_recieved',
        'customer_id',
        'vendor_id',
        'created_by',
        'pre_balance'
    ];

    public function createdBy()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

    public function detail()
    {
        return $this->hasMany(InvoiceDetail::class,  'invoice_id');
    }
}
