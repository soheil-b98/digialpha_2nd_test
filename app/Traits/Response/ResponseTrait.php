<?php

namespace App\Traits\Response;

trait ResponseTrait
{
    public function success($message, $data = null, $status = 200)
    {
        $data = [
            'message'=>$message,
            'body'=>$data
        ];
        return response()->json($data, $status);
    }

    public function fail($message, $error = null, $status = 400)
    {
        return response()->json([
            'message'=>$message,
            'error'=>$error
        ],$status);
    }
}
