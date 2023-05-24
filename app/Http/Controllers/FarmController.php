<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Resources\FarmResource;
use App\Http\Resources\ShowFarmResource;
use App\Models\Drone;
use App\Models\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        $farms = FarmResource::collection($farms);
        return response()->json(['success' =>true, 'data' => $farms],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::store($request );
        return response()->json(['success'=>true, 'data' => $farm], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farm = Drone::find($id);
        $farm = new ShowFarmResource($farm);
        return response()->json(['success'=>true, 'data' => $farm], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFarmRequest $request, string $id)
    {
        $farm = Farm::store($request, $id);
        return response()->json(['success'=>true, 'data' => $farm], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farm = Farm::find($id);
        $farm ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
    }
}
