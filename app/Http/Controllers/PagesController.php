<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //首页
    public function root(){
		return view('pages.root');
	}

	//
	public function emailVerifyNotice(Request $request){
		return view('pages.email_verify_notice');
	}
}
