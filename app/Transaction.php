<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'online_payment_transaction_data';
    protected $fillable = [
                'order_id',
                'merchant_transaction_id',
                'gateway_transaction_id',
                'payment_status',
                'payment_method',
                'created_at',
                'updated_at'
    ];
}
