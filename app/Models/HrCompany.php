<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * サービス利用会社
 */
class HrCompany extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * 利用会社とのリレーション
     * @return HasMany
     */
    public function hrUsers(): HasMany
    {
        return $this->hasMany('App\Models\HrUser');
    }

    /**
     * 利用会社:店舗・オフィスとのリレーション
     * @return HasMany
     */
    public function hrOffices(): HasMany
    {
        return $this->hasMany('App\Models\HrOffice');
    }
}
