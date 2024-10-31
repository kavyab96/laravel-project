<?php

// use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//------------------------------------------


// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\ValidationException;



// Route::post('/register', function (Request $request) {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users',
//         'password' => 'required|string|min:3',
//     ]);

//     $user = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => Hash::make($request->password),
//     ]);

//     return $user;
// });

// Route::post('/login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|string|email',
//         'password' => 'required|string',
//     ]);

//     if (!Auth::attempt($request->only('email', 'password'))) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }

//     $user = $request->user();
//     $token = $user->createToken('API Token')->accessToken;

//     return response()->json(['token' => $token]);
// });
//-----------------------------




// using string syntax
// Route::post('/register', 'App\Http\Controllers\AuthController@register');


Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::post('/register', 'AuthController@register');
});

// using array syntax
use App\Http\Controllers\AuthController;
// Route::post('/register', 'AuthController@register');
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/user', [AuthController::class, 'user']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class,'user']);
});

