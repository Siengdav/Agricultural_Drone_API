<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'farms');
    }
}
