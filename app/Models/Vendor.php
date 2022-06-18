<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'role',
        'profile_image',
        'type',
        'status',
        'balance',
        'opening_balance',
        'created_by',
    ];

    public function purchasedProducts()
    {
        return $this->hasManyThrough(InvoiceDetail::class, Invoice::class);
    }
}
