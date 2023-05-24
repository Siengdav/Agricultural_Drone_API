<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'drone_id',
        'plan_id'
    ];
    public static function store($request, $id = null)
    {   
        
        $instuction = $request->only([
            'drone_id',
            'plan_id'
        ]);
        $instuction = self::updateOrCreate(['id' => $id], $instuction);
        return $instuction;

    }
}
