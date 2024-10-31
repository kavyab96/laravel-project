<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
    $input = $request->all();
    $input= $input['params'] ?? $input;
       
        $validatedData = validator($input, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
        ])->validate();
        
            $user = User::create([
              

                'name' => $input['name'], // Ensure you use $input instead of $request
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            return $user;
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Create an access token
            $token = $user->createToken('API Token')->accessToken;

            // Return a success response with the token
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token
            ], 200);
        } else {
            // Return an error response if authentication fails
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }
    }



    public function user(Request $request){
        return User::get();
    }
}
