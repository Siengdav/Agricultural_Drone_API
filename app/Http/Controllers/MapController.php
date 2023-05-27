<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMapRequest;
use App\Http\Resources\MapResource;
use App\Http\Resources\ShowMapResource;
use App\Models\Farm;
use App\Models\Location;
use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['success' =>true, 'data' => $maps],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        $map = Map::store($request );
        return response()->json(['success'=>true, 'data' => $map], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $map = Map::find($id);
        if($map){
            $map = Map::find($id);
            $map = new ShowMapResource($map);
            return response()->json(['success'=>true, 'data' => $map], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMapRequest $request, string $id)
    {
        $map = Map::find($id);
        if($map){
            $map = Map::store($request, $id);
            return response()->json(['success'=>true, 'data' => $map], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::find($id);
        if($map){
            $map = Map::find($id);
            $map ->delete();
            return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }
    //Download farm image by farmID
    public function downLoadFarmPhoto($province, $farm_id)
    {
        $map = Map::where('province', $province)
            ->whereHas('farms', function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            })
            ->with(['farms' => function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            }])
            ->first();
        if ($map === null) {
            return response()->json(['message' => 'No map found.'], 404);
        } else {
            return response()->json(['status' => 'success', 'image' => $map->image], 202);
        }
    }

    //Delete farm image by farmID
    public function deleteFarmImage($province, $farm_id)
    {
        $map = Map::where('province', $province)
            ->whereHas('farms', function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            })
            ->with(['farms' => function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            }])
            ->first();
        if(!$map){
            return response()->json(['message'=>'Not found'],404);
        }
        if (!$map->image) {
            return response()->json(['message' => 'Map image not found'], 404);
        }
        $map->image = "null";
        $map->save();
        return response()->json(['message'=>'Image deleted successfully'], 200);
    }

    //Create farm image by farmID
    public function createFarmImage($province, $farm_id, Request $request)
    {
        $map = Map::where('province', $province)
            ->whereHas('farms', function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            })
            ->with(['farms' => function ($query) use ($farm_id) {
                $query->where('id', $farm_id);
            }])
            ->first();
        // $drone_id = $map->drone_id;
        if(!$map){
            return response()->json(['message'=>'Not found'],404);
        }
        $map->image = $request->input('image');
        $map->save();
        return response()->json(['message'=>'Image create successfully', 'data'=>$map], 200);
    }
}
