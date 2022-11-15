<?php

namespace App\Http\Controllers;

use App\Bu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowSingleBulldingGuestController extends Controller
{
    // start show Single Building for guest
    public function showSingleBulldingguest($id,Bu $bu){
        $buinfo=$bu->findOrFail($id);
        if ($buinfo->bu_status=='غير مفعل' &&\auth()->guest()){
            return view('website.userbuilding.noper',compact('buinfo'));
        }
        $same_rant=$bu->where('bu_rant',$buinfo->bu_rant)->orderBy(DB::raw('RAND()'))->take(1)->get();
        $same_type=$bu->where('bu_type',$buinfo->bu_type)->orderBy(DB::raw('RAND()'))->take(1)->get();
        $same_status=$bu->where('bu_status',$buinfo->bu_status)->orderBy(DB::raw('RAND()'))->take(1)->get();
        return view('website.bu.SingleBullding',compact('buinfo','same_rant','same_type','same_status'));
    }
// end show Single Building for guest
}
