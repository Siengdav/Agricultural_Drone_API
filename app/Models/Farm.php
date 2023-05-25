<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'location_id'
    ];
    public static function store($request, $id = null)
    {    
        $farm = $request->only([
            'user_id',
            'location_id',
        ]);
        $farm = self::updateOrCreate(['id' => $id], $farm);
        return $farm;
    }
    public function Maps():HasMany
    {
        return $this->hasMany(Map::class);
    }
}
