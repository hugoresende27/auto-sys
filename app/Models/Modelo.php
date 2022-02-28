<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the make associated with the Modelo
     * 1 MODEL HAS 1 MAKE
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function make()//: HasOne
    {
        return $this->hasOne(Manu::class, 'make', 'make_id');
    }
}
