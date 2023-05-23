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
<<<<<<< HEAD
        'map_id',
    ];
    public function map()
    {
        return $this->belongsTo(Map::class);
=======
        'drone_id'
    ];

    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
>>>>>>> f17cab28adad3ddf7afc87bd17af1c90754cb3ba
    }
}
