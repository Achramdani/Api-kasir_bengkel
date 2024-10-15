<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicles extends Model
{
    /** @use HasFactory<\Database\Factories\VehiclesFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plat_nomor',
        'merek',
        'model',
        'tahun',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
