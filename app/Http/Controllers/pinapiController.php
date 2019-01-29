<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pins;
use App\Http\Resources\Pins as PinResource;

class pinapiController extends Controller
{
    //
   

    public function index(){
        //get all users
        $pins = Pins::get();

        //Return a collection of users with pagination
        return PinResource::collection($pins);
    }

    public function show($id)
    {
        //Get the task
        $pin = Pins::findOrfail($id);
 
        // Return a single task
        return new PinResource($pin);
    }

}
