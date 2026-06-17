<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

final class Link extends Model
{
    use HasUuids;

    const UPDATED_AT = null;

    protected $fillable = ['code', 'url', 'clicks'];

    protected $casts = ['created_at' => 'datetime:Y-m-d\TH:i:s\Z',];
}
