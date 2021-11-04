<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 利用会社: ユーザー
 */
class HrUser extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * サービス利用会社 とのリレーション(hr company => サービス利用会社)
     * @return BelongsTo
     */
    public function HrCompany(): BelongsTo
    {
        return $this->belongsTo('App\Models\HrCompany');
    }

    /**
     * 利用会社: 店舗、オフィスとのリレーション
     * @return BelongsTo
     */
    public function HrOffice(): BelongsTo
    {
        return $this->belongsTo('App\Models\HrOffice');
    }
}
