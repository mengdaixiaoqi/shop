<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdderssesController extends Controller
{
    public function index(Request $request){
        return view('user_addresses.index',[
            'addresses'=>$request->user()->addresses,
        ]);
    }
}
