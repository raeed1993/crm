<?php


use Illuminate\Support\Facades\DB;

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
if (!function_exists('connectDB')) {
    function connectDB($fn)
    {
        try {
            DB::beginTransaction();
            $data = $fn;
            DB::commit();
            return $data;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }
}




