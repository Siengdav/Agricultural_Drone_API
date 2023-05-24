<?php
use App\Http\Controllers\DroneController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
//Route Drone
Route::get('/drones',[DroneController::class,'index']);
Route::get('/drones/{id}',[DroneController::class,'show']);
Route::post('/drones',[DroneController::class,'store']);
Route::delete('/drones/{id}',[DroneController::class,'destroy']);
Route::put('/drones/{id}',[DroneController::class,'update']);
//Route Plan
Route::get('/plans',[PlanController::class,'index']);
Route::get('/plans/{id}',[PlanController::class,'show']);
Route::post('/plans',[PlanController::class,'store']);
Route::delete('/plans/{id}',[PlanController::class,'destroy']);
Route::put('/plans/{id}',[PlanController::class,'update']);
//Route Instruction
Route::get('/instructions',[InstructionController::class,'index']);
Route::get('/instructions/{id}',[InstructionController::class,'show']);
Route::post('/instructions',[InstructionController::class,'store']);
Route::delete('/instructions/{id}',[InstructionController::class,'destroy']);
Route::put('/instructions/{id}',[InstructionController::class,'update']);