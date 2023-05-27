<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;
use App\Models\Instruction;
use App\Models\Location;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['success' =>true, 'data' => $drones],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDroneRequest $request)
    {
        $drone = Drone::store($request );
        return response()->json(['success'=>true, 'data' => $drone], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        if ($drone) {
            $drone = Drone::find($id);
            $drone = new ShowDroneResource($drone);
            return response()->json(['success'=>true, 'data' => $drone], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDroneRequest $request, string $id)
    {
        $drone = Drone::find($id);
        if ($drone) {
            $drone = Drone::store($request, $id);
            return response()->json(['success'=>true, 'data' => $drone], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        if ($drone) {
            $drone = Drone::find($id);
            $drone ->delete();
            return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }
    //Show current location in drone
    public function ShowCurrentLocation($drone_id)
    {
        $drone = Drone::findOrFail($drone_id);
        $locations = Location::whereHas('drone', function ($query) use ($drone_id) {
            $query->where('id', $drone_id);
        })->get();
        return $locations;
    }   
}
