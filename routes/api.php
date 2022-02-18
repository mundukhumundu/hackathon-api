<?php
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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
// Route::resource('orders', OrderController::class);

// public routes
Route::get('/orders/search/{name}', [OrderController::class, 'search']);
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::group(['middleware'=> ['auth:sanctum']], function (){
    
    Route::post('/orders', [OrderController::class, 'store']); 
    Route::get('/orders/{id}', [OrderController::class, 'show']); 
    Route::put('/orders/{id}', [OrderController::class, 'update']); 
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
     
});

// Route::get('/orders', [OrderController::class, 'show']);

// Route::post('/orders', function(){
//     return Orders::create([
//         'name' => 'test',
//         'phone-number' => '0712364569',
//         'address' => 'nairobi',
//         'pickup-person' => 'john',
    
//     ]);
// });


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

