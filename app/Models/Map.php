<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Map extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'drone_id'
    ];
   
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
}
