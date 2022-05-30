<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserAvatarController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        $request->validate(['image_name' => 'required']);

        try {
            $file = $request->file('image_name')->store('public/avatars');

            auth()->user()->avatar()->create([
                'image_name' => $file,
            ]);

            return response()->json([
                'message' => 'Avatar uploaded successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Avatar upload failed',
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
