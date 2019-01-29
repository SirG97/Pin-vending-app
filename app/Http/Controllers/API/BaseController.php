<?php

namespace App\Http\Controller\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller{
     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

     public function sendResponse($result, $message){
         $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
         ];

         return response()->json($response, 200);
     }

     public function sendError($error, $errorMsg = [], $code=404){
         $response = [
            'success' => true,
            'message' => $message,
         ];

         if(!empty($errorMsg)){
             $response['data'] = $errorMsg;
         }
         return response()->json($response, $code);
     }
}