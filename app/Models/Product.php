<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost_price',
        'sale_price',
        'opening_qty',
        'available_qty',
        'unit',
        'images',
        'colors',
        'description',
        'brand',
        'product_category_id',
        'product_model_id',
        'product_subcategory_id',
        'created_by',
        'meter',
        'ghaz',
        'kg',
    ];

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'product_category_id');
    }

    public function model()
    {
        return $this->hasOne(ProductModel::class, 'id', 'product_model_id');
    }

    public function creator()
    {
        return $this->hasOne(Admin::class, 'id', 'created_by');
    }
}
