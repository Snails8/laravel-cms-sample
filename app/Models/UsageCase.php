<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 導入事例
 */
class UsageCase extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
