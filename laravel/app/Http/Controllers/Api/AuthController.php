<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create User
     * @param RegisterRequest $request
     * @return User 
     */
    public function createUser(RegisterRequest $request)
    {
        try {
            if ($request->validated()) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Usuário criado com sucesso!',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(LoginRequest $request)
    {
        try {
            if ($request->validated()) {
                if (!Auth::attempt($request->only(['email', 'password']))) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Email ou senha incorretos',
                    ], 401);
                }

                $user = User::where('email', $request->email)->first();

                return response()->json([
                    'status' => true,
                    'message' => 'Login Realizado com sucesso!',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function me(Request $request)
    {
        return $request->user();
    }
}
