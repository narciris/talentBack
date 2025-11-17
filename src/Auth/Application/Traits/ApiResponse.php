<?php

namespace Src\Auth\Application\Traits;

trait ApiResponse
{
    protected function success(mixed $data = null,
                               string $message = 'OK',
                               int $code = 200)
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    protected function error(string $message = 'Error', int $code = 400, mixed $errors = null)
    {
        return response()->json([
            'status'  => 'error',
            'message' => $message,
            'errors'  => $errors
        ], $code);
    }

    protected function message(string $message, int $code = 200)
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message
        ], $code);
    }

}
