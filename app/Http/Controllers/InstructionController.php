<?php
namespace App\Http\Controllers;


use App\Http\Requests\StoreInstructionRequest;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\ShowInstructionResource;
use App\Models\Instruction;

use Illuminate\Http\Request;
class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruction = Instruction::all();
        $instruction = InstructionResource::collection($instruction);
        return response()->json(['success' =>true, 'data' => $instruction],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstructionRequest $request)
    {
        $instruction = Instruction::store($request );
        return response()->json(['success'=>true, 'data' => $instruction], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instruction = Instruction::find($id);
        if ($instruction) {
            $instruction = Instruction::find($id);
            $instruction = new ShowInstructionResource($instruction);
            return response()->json(['success'=>true, 'data' => $instruction], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreInstructionRequest $request, string $id)
    {
        $instruction = Instruction::find($id);
        if ($instruction) {
            $instruction = Instruction::store($request, $id);
            return response()->json(['success'=>true, 'data' => $instruction], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction = Instruction::find($id);
        if ($instruction) {
            $instruction = Instruction::find($id);
            $instruction ->delete();
            return response()->json(['success'=>true, 'message' => 'Data delete successfully'], 200);
        }
        return response()->json(['message'=> 'Id not found'], 404);
    }
}
