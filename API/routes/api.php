<?php
use App\Http\Controllers\PetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RequestServController;
use Illuminate\Http\Request;
use App\Models\Pets;
use App\Models\Service;
use App\Models\RequestServ;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public User Routes
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/register2', [AuthController::class, 'register2']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/users', [AuthController::class, 'users']);


//For Pets
Route::post('/allpets', [PetController::class, 'index']);

Route::get('/showpets', function(){
    return Pets::all();
});

Route::post('/pets', [PetController::class, 'store']);
Route::put('/pets/{id}', [PetController::class, 'update']);
Route::delete('/pets/{id}', [PetController::class, 'destroy']);


//For Services
Route::post('/allservices', [ServiceController::class, 'index']);
Route::get('/showservices', function(){
    return Service::all();
});
Route::post('/services', [ServiceController::class, 'store']);
Route::put('/services/{id}', [ServiceController::class, 'update']);
Route::delete('/services/{id}', [ServiceController::class, 'destroy']);


//For Request
Route::post('/request', [RequestServController::class, 'store']);
Route::post('/allrequest', [RequestServController::class, 'index']);
Route::get('/showrequest', function(){
    return RequestServ::all();
});
Route::delete('/request/{id}', [RequestServController::class, 'destroy']);

//Routes
Route::resource('pets', PetController::class);
Route::get('/pets/search/{name}', [PetController::class, 'search']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    
});

// Route::get('/pets', [PetController::class, 'index']);
// Route::post('/pets', [PetController::class, 'store']); 


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
