<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'drone_id',
        'plan_id'
    ];
    public static function store($request, $id = null)
    {   
        $instuction = $request->only([
            'status',
            'drone_id',
            'plan_id'
        ]);
        $instuction = self::updateOrCreate(['id' => $id], $instuction);
        return $instuction;

    }
    public function drone():BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    public function plan():BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
   
}
