<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;


    protected $fillable = [
        'id' ,
        'code' ,
        'title' 
    ];



  
    /**
     * Get all of the modelos for the Make
     * 1 MAKE HAS MANY MODELS
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelos(): HasMany
    {
        return $this->hasMany(Modelo::class, 'make_id', 'code');
    }
}
