<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AppBaseController extends Controller
{
    protected function sendResponse(
        mixed $result,
        string $message = 'Success',
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ], $code);
    }

    protected function sendError(
        string $error,
        int $code = 404,
        mixed $errors = null
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $error,
            'errors'  => $errors,
        ], $code);
    }

    protected function sendSuccess(
        string $message,
        int $code = 200
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $code);
    }
}
