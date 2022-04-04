<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sale_quantity',
        'purchase_price',
        'sale_price',
        'total_ammount',
        'invoice_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
