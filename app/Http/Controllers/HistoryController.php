<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    //
    public function index(){
        return view('history');
    }

    // public function setLivePin(Request $request){
    //     $setlive = DB::update('update pins set status = live where status = ?', ['generated']);
    //     return print_r($setlive);
    // }
}
