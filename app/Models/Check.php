<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    use HasUuids;

    /**
     * Define que a chave primária não é auto-incremental.
     */
    public $incrementing = false;

    /**
     * Define que a chave primária é do tipo string (UUID).
     */
    protected $keyType = 'string';

    protected $fillable = [
        'endpoint_id', 'status_code', 'response_body',
    ];

    public function endpoint() :BelongsTo
    {
        return $this->belongsTo(Endpoint::class);
    }
}
