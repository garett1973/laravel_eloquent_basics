<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Car extends Model
{
    use HasFactory;

    // If you want to use a different table name, uncomment the following lines:
//    protected $table = 'cars';
    // If you want to use a different primary key, uncomment the following lines:
//    protected $primaryKey = 'id';
    // If you want to use a different primary key type, uncomment the following lines:
//    protected $keyType = 'string';
    // If you want to disable auto-incrementing, uncomment the following lines:
//    public $incrementing = false;
    // If you want to use timestamps, uncomment the following lines:
//    public $timestamps = true;

    protected $fillable = [
        'name',
        'founded',
        'description',
        'image_path',
        'user_id'
    ];

    protected $hidden = [
        'updated_at',
    ];

    protected $visible = [
        'name',
        'founded',
        'description',
        'image_path',
    ];

    protected $casts = [
        'created_at' => 'date',
    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    // Define a has many through relationship
    public function engines(): HasManyThrough
    {
        return $this->hasManyThrough(Engine::class, CarModel::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
