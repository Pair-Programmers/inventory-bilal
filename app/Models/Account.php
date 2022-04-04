<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'account_title',
        'type',
        'account_number',
        'bank_name',
        'as_off_date',
        'opening_balance',
        'balance',
        'created_by',
    ];

}
