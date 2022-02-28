<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manu extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the Manu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelos(): HasMany
    {
        return $this->hasMany(Modelo::class, 'make_id', 'make');
    }
}
