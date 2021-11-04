<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * サービス利用会社: 店舗・オフィス
 */
class HrOffice extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * 利用会社とのリレーション
     * @return BelongsTo
     */
    public function hrCompany(): BelongsTo
    {
        return $this->belongsTo('App\Models\HrCompany');
    }

    /**
     * 利用会社:ユーザーとのリレーション
     * @return HasMany
     */
    public function hrUsers(): HasMany
    {
        return $this->hasMany('App\Models\HrUser');
    }
}
