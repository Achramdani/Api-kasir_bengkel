<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointsments extends Model
{
    /** @use HasFactory<\Database\Factories\AppointsmentsFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'mechanic_id',
        'appointment_date',
        'status',
    ];



    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function mechanic(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
