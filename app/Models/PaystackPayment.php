<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaystackPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'user_id',
        'email',
        'payment_type',
        'order_id',
        'amount',
        'referral_amount',
        'status',
        'response',
        // 'user_id',
        // 'order_id',
        // 'amount_paid',
        // 'amount',
        // 'cherix_reference',
        // 'paystack_reference',
        // 'currency',
        // 'status',
    ];
}
