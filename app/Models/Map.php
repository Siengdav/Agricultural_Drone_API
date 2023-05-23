<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;
    protected $fillable =[
        'latitude',
        'longitude',
    ];
   
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
