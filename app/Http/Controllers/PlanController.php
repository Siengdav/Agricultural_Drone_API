<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ShowPlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        $plans = PlanResource::collection($plans);
        return response()->json(['success' =>true, 'data' => $plans],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        $plan = Plan::store($request );
        return response()->json(['success'=>true, 'data' => $plan], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $plan = Plan::find($id);
        if ($plan) {
            $plan = Plan::find($id);
            $plan = new ShowPlanResource($plan);
            return response()->json(['success'=>true, 'data' => $plan], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePlanRequest $request, string $id)
    {
        $plan = Plan::find($id);
        if ($plan) {
            $plan = Plan::store($request, $id);
            return response()->json(['success'=>true, 'data' => $plan], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        if ($plan) {
            $plan = Plan::find($id);
            $plan ->delete();
            return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }
}
