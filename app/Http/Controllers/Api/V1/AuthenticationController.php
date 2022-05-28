<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (auth()->attempt($request->all())) {
            $user = auth()->user();

            $user->tokens()->delete();

            $token = explode('|',$user->createToken('authToken')->plainTextToken)[1];

            return response()->json([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'token' => $token
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'This User does not exist, check your details'
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(): Response
    {
        auth()->user()->tokens()->delete();

        return response()->noContent();
    }
}
