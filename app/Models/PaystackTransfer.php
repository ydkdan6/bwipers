<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaystackTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'account_number',
        'bank_code',
        'status',
        'response',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
