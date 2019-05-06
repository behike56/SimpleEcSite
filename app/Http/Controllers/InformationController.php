<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * ABOUT page
     **/
    public function siteInfo(Request $request){
        return view('etc.siteInfo');
    }

    /**
     * CONTACT page
     **/
    public function contact(Request $request){
        return view('etc.contact');
    }

    /**
     * COMPANY page
     **/
    public function company(Request $request){
        return view('etc.company');
    }
}

