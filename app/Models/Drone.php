<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{

    use HasFactory;
    protected $fillable =[
        'type',
        'dateTime',
        'image',
        'battery',
        'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'instructions');
    }
}
