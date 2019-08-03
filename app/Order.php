<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
            'invoices_id',
            'sub_total',
            'shipping',
            'order_total',
            'billing_address',
            'shipping_address',
            'payment_method',
            'order_status',
            'created_at',
            'updated_at'
        ];
}
