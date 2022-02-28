<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manu(): HasOne
    {
        return $this->hasOne(Manu::class, 'make', 'make');
    }

    /**
     * Get the user associated with the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modelo(): HasOne
    {
        return $this->hasOne(Modelo::class, 'id', 'model_id');
    }
}
