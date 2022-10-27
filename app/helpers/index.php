<?php

use Illuminate\Support\Facades\Response;

    function apiResponse($code, $status, $message, $data=[]){
        $data = [
            'meta'=>
            [
                'code' => $code,
                'status' =>$status,
                'message' =>$message
            ],
            'data'=>$data

            ];
            return Response::json($data, $code);
        }
?>
