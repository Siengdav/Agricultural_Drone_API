<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'planName',
        'user_id'
    ];
    public static function store($request, $id = null)
    {   
        
        $plan = $request->only([
            'planName',
            'user_id'
        ]);
        $plan = self::updateOrCreate(['id' => $id], $plan);
        return $plan;

    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function drones()
    {
        return $this->belongsToMany(Drone::class, 'instructions');
    }
    public function Instructions():HasMany
    {
        return $this->hasMany(Instruction::class);
    }
}
