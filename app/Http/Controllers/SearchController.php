<?php

namespace App\Http\Controllers;

use App\Bu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{



    public function forrent(Bu $bu){
        $buall=$bu->where('bu_status' ,'مفعل ')->where('bu_rant' ,'ايجار ')->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('buall'));
    }

    public function forbay(Bu $bu){
        $buall=$bu->where('bu_status' ,'مفعل ')->where('bu_rant' ,'تمليك ')->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('buall'));

    }

    public function fortype($type, Bu $bu){
        if(in_array($type, ['شقه','فيله','شاليه'])){
            $buall=$bu->where('bu_status' ,'مفعل ')->where('bu_type' , $type)->orderBy('id','desc')->paginate(6);
            return view('website.bu.all',compact('buall'));
        }else{
            return redirect('/showallbulding')->withFlashMassage('هذا العقار غير مسجل لدينا ');
        }



    }

    public  function search(Request $request ,Bu $bu){
        $requestall =array_except($request->toArray(),['submit','_token','page']);
        $query =DB::table('bu')->select('*');
        $array=[];
        $cout=count($requestall);
        $i=0;
        foreach ($requestall as $key =>$req){
            $i++;
            if ( !empty($req)){
                if ($key == 'bu_price_from' && empty($request->bu_price_to)) {
                    $query->where('bu_price', '>=', $req);
                }elseif ($key == 'bu_price_to' && empty($request->bu_price_from)){
                    $query->where('bu_price', '<=', $req);
                }else{
                    if ($key != 'bu_price_to' && $key != 'bu_price_from'){
                        $query->where($key,$req);
                    }
                }
                $array[$key]=$req ;
            }elseif ($cout == $i && !empty($request->bu_price_to)  && $request->bu_price_from ){
                $query->whereBetween('bu_price',[$request->bu_price_from , $request->bu_price_to]);
                $array[$key]=$req ;
            }
        }
        $buall=$query->orderBy('id','desc')->paginate(6);
        return view('website.bu.all',compact('buall' ,'array'));
    }

}
