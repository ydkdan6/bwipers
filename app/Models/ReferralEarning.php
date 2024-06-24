<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralEarning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sales_person_name',
        'email',
        'amount',
        'order_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
