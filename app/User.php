<?php

namespace App;

use App\Models\CreditHistory;
use App\Models\Referral;
use App\Models\SalesPersonProfile;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'photo', 'status', 'provider', 'provider_id', 'phone',
        'business_name',
        'address_one',
        'address_two',
        'country',
        'state',
        'referral_id',
        'monthly_sales_volume',
        'profile',
        'earnings',
        'bank_name',
        'bank_code',
        'account_number',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function creditHistories()
    {
        return $this->hasMany(CreditHistory::class);
    }

    public function getGravatarAttribute()
    {
        return Gravatar::get($this->email);;
    }

    public function referrals()
    {
        return $this->hasMany(Referral::class);
    }

    public function referral()
    {
        return $this->hasOne(Referral::class);
    }

    public function salesProfile()
    {
        return $this->hasOne(SalesPersonProfile::class);
    }
}
