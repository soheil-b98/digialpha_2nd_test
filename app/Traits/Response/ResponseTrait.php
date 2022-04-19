<?php

namespace App\Traits\Response;

trait ResponseTrait
{
    public function success($message, $status, $data = null)
    {
        $data = [
            'message'=>$message,
            'body'=>$data
        ];
        return response()->json($data, $status);
    }

    public function fail($message, $status, $error)
    {
        return response()->json([
            'message'=>$message,
            'error'=>$error
        ],$status);
    }
}
