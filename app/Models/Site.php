<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    /**
     * Define que a chave primária não é auto-incremental.
     */
    public $incrementing = false;

    /**
     * Define que a chave primária é do tipo string (UUID).
     */
    protected $keyType = 'string';

    protected $fillable = [
        'url',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function endpoints() :HasMany
    {
        return $this->hasMany(Endpoint::class);
    }
}
