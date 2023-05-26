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
        $map = new ShowMapResource($map);
        return response()->json(['success'=>true, 'data' => $map], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMapRequest $request, string $id)
    {
        $map = Map::store($request, $id);
        return response()->json(['success'=>true, 'data' => $map], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $map = Map::find($id);
        $map ->delete();
        return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
    }
    public function downLoadFarmPhoto($province, $farm_id)
    {
        $map = Map::where('province', $province) 
        ->whereHas('farm', function ($query) use ($farm_id) {
            $query->where('id', $farm_id);})->first();
        if(!$map){
            return response()->json(['message'=>'Not found'],404);
        }
        if (!$map->image) {
            return response()->json(['message' => 'Map image not found'], 404);
        }
        $image = $map->image;
        $image->save();
        dd($image);
        return response()->json(['message'=>'Image download successfully'], 200);

    }
    public function deleteFarmImage($province, $farm_id)
    {
        $map = Map::where('province', $province)->with(['farm' => function($query) use ($farm_id){
            $query->orderByDesc('created_at')->where('id', $farm_id); }])->first();
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
}
