<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:32',
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);
        $result = User::create($validateData);
        if ($result) {
            return response()->json([
                'success' => true,
                'user'    => $result,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
            ], 409);
        }
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8|max:32',
        ]);

        // $credential = ;
        if (!$token = auth()->guard('api')->attempt($validateData)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
            
           
        } else {
            // $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'token'   => $token,
                'admin'    => auth()->guard('api')->user(),    
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',  
            ]);
        }
    }
}
