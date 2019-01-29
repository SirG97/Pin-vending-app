<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Pins;
use Validator;


class ProductController extends BaseController{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $pins = Pins::all();
        return $this->sendResponse($pin->toArray(), 'product retrieved successfully');
    }

    public function show($id){
            /**
     * Show a single resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        $pin = Pin::find($id);

        if(is_null($pin)){
            return $this->sendError('Pin does not exist');
        }

        return $this->sendResponse($pin->toArray(), 'Pin retrieved Successfully');

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, Pin $pin){

        $input = $request->all();
        $validator = Validator::make($input,[
            'user_id' => required|numeric,
            'bank' => required|numeric,
            'account_sent_to' => required,
            'status' => ["required", "regex:(used)"],
            'updated_at' => required
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $pin->user_id = $input['user_id'];
        $pin->bank = $input['bank'];
        $pin->account_sent_to = $input['account_sent_to'];
        $pin->status = $input['status'];
        $pin->updated_at = $input['updated_at'];
        $pin->save();

        return $this->sendResponse($pin->toArray(), 'Pin information updated successfully');
     }


}