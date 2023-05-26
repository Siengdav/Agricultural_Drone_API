<?php
use App\Http\Controllers\DroneController;

use App\Http\Controllers\InstructionController;
use App\Http\Controllers\PlanController;

use App\Http\Controllers\FarmController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MapController;

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

//Route Location
Route::get('/locations',[LocationController::class,'index']);
Route::get('/locations/{id}',[LocationController::class,'show']);
Route::post('/locations',[LocationController::class,'store']);
Route::put('/locations/{id}',[LocationController::class,'update']);
Route::delete('/locations/{id}',[LocationController::class,'destroy']);
//Route Map
Route::get('/maps',[MapController::class,'index']);
Route::get('/maps/{id}',[MapController::class,'show']);
Route::post('/maps',[MapController::class,'store']);
Route::put('/maps/{id}',[MapController::class,'update']);
Route::delete('/maps/{id}',[MapController::class,'destroy']);
//Route Farm
Route::get('/farms',[FarmController::class,'index']);
Route::get('/farms/{id}',[FarmController::class,'show']);
Route::post('/farms',[FarmController::class,'index']);
Route::put('/farms/{id}',[FarmController::class,'update']);
Route::delete('/farms/{id}',[FarmController::class,'destroy']);

//Show current latitude+longitude of drone D23
Route::get('/drones/{id}/location',[DroneController::class,'ShowCurrentLocation']);
//Download map photo the drone By province and farm ID
Route::get('/maps/{nameLocation}/{farmId}',[MapController::class,'downLoadFarmPhoto']);
//Delete the image By province and farm ID
Route::delete('/maps/{nameLocation}/{farmId}',[MapController::class,'deleteFarmImage']);
//Create ImageFarm
// Route::post('/maps/{nameLocation}/{farmId}',[MapController::class,'createFarmImage']);

