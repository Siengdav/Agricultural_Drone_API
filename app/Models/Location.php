<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable =[
        'province',
        'latitude',
        'longitude',
        'map_id',
        'drone_id'
    ];
    public static function store($request, $id = null)
    {    
        $location = $request->only([
            'province',
            'latitude',
            'longitude',
            'map_id',
            'drone_id'
        ]);
        $location = self::updateOrCreate(['id' => $id], $location);
        return $location;
    }
    public function map()
    {
        return $this->belongsTo(Map::class);
    }
    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
    public function drones():BelongsTo
    {
        return $this->belongsTo(Drone::class);
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
