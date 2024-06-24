<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'user_id', 'isValid', 'ref_usage'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
}
