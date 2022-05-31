<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Traits\HandleFile;

class UserAvatarController extends Controller
{
    use HandleFile;

    public function upload(Request $request): JsonResponse
    {
        $request->validate(['image_name' => 'required']);

        try {
            if ($avatar = auth()->user()->avatar?->image_name) {
                $this->deleteFile($avatar);
            }

            $file = $this->storeFile($request->file('image_name'), 'avatars');

            auth()->user()->avatar()->updateOrCreate(['user_id' => auth()->user()->id], [
                'image_name' => $file,
            ])->refresh();

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
