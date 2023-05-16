<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'zakazs';

    protected $fillable = [
        'buyer_id',
        'product_id',
        'amount',
    ];
}
