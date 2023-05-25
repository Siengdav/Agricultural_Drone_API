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
        'province',
        'image',
        'drone_id',
        'farm_id'
    ];
    public static function store($request, $id = null)
    {    
        $map = $request->only([
            'province',
            'image',
            'drone_id',
            'farm_id'
        ]);
        $map = self::updateOrCreate(['id' => $id], $map);
        return $map;
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function farm():BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
}
