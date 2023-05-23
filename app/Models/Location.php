<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable =[
        'province',
        'map_id',
    ];
    public function map()
    {
        return $this->belongsTo(Map::class);
    }
}
