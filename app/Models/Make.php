<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'id' => 'array',
    //     'code' => 'array',
    //     'title' => 'array'
    // ];

    protected $fillable = [
        'id' ,
        'code' ,
        'title' 
    ];
}
