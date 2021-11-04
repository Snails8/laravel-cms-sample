<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * お知らせ (laravel では基本 migration名(複数系) => model名(単数形) にしないといけないが newsは news で通るよう作られている)
 * Class News
 * @package App\Models
 */
class News extends Model
{
    use HasFactory;

    // そのままだとstringで取得してしまいformat()が使用できないためにDateTime型に変換(Eloquent)
    protected $dates = ['public_date'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * NewsCategory とのリレーション
     * @return BelongsToMany
     */
    public function newsCategories(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\NewsCategory')->withTimestamps();
    }
}
