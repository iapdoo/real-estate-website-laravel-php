<?php

namespace App\Http\Controllers;

use App\Bu;
use Illuminate\Http\Request;

class ShowAllEnableController extends Controller
{
    public function showallenable(Bu $bu){
        $buall=$bu->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('buall'));
    }

}
