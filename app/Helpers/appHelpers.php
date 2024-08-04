<?php


if (!function_exists('oK')) {
    function oK($data = null, $message = null)
    {
        return response()->json([
            'data' => $data,
            'status' => true,
            'message' => $message ?? 'success',
        ]);
    }
}
if (!function_exists('badRequest')) {
    function badRequest($message = null, $data = null)
    {
        return response()->json([
            'data' => $data,
            'status' => false,
            'message' => $message ?? 'error',
        ], 400);
    }
}




