<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class CarModel extends Model
{
    use HasFactory;

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function productionStartDate(): HasOne
    {
        return $this->hasOne(CarProductionDate::class);
    }
}
