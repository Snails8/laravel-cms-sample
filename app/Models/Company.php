<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 自社情報
 * Class Company
 * @package App\Models
 */
class Company extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Userとのリレーション
     * @return HasMany
     */
    public function Users(): HasMany
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * 事務所とのリレーション
     * @return HasMany
     */
    public function Offices(): HasMany
    {
        return $this->hasMany('App\Models\Office');
    }
}
