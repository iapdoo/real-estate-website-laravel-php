<?php

namespace App\Http\Controllers;

use App\Bu;
use App\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserBuildingController extends Controller
{
    public function userAddView(){
        return view('website.userbuilding.useradd');
    }
    // user store function
    public function userstore(Request $request ,Bu $bul){


        $rules=[

            'bu_type' =>  'required',
            'bu_name' =>  'required|string|max:100',
            'bu_price' =>  'required',
            'bu_square' =>  'required|string|max:100',
            'bu_meta' =>  'string|max:100',
            'bu_langtude' =>  'required|string|max:100',
            'bu_latetude' =>  'required|string|max:100',
            'bu_rant' =>  'required',
            'bu_large_dis' =>  'required|string|max:200',
            'bu_small_dis' =>  'required|string|max:200',
            'bu_rooms' =>  'required',
            'bu_place'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'files.*'=>'mimes:jpg,jpeg,png,svg,gif|max:2048s',
        ];
        $data= $this->validate(request(),
            $rules,[],[]
        );
        $tempfolder=  time();
        $data['bu_status']='غير مفعل';
        $data['photo']=$request->photo->store('image/'.$tempfolder);
        $data['user_id']= auth()->user()->id;
        $bu=  Bu::create($data);
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                Storage::makeDirectory('image/' . $bu->id);
                $uploadfile = $file->store('image/' . $bu->id);
                files::create([
                    'user_id' =>\auth()->user()->id,
                    'bu_id' => $bu->id,
                    'path' => 'image/' . $bu->id,
                    'file' => $uploadfile,
                    'file_name' => $file->getClientOriginalName(),
                    'size' => Storage::size($uploadfile),
                ]);
            }
        }
        $newname=str_replace($tempfolder,$bu->id,$bu['photo']);

        Storage::rename($bu['photo'],$newname); // add new Directory folder
        Bu::where('id',$bu->id)->update(['photo'=>$newname]); //move from temp folder to id news folder

        Storage::deleteDirectory('image/'.$tempfolder); //delete Directory of temp folder

        return view('website.userbuilding.done')->withFlashMassage('تمت اضافه علي  العقار  بنجاح ');


    }

    public function userEditBuilding( Bu $buinfo,$id){
        $user=auth()->user();
        $bu=$buinfo->find($id);
        if ($user->admin==1){
            return view('website.userbuilding.userEditBuilding',compact('bu','user')) ;
        }
        elseif ($user->id!=$bu->user_id){
            return view('website.userbuilding.nopermetionToEdit',compact('buinfo','user')) ;
        }
        return view('website.userbuilding.userEditBuilding',compact('bu','user')) ;

    }

    public function Userupdate(Request $request,$id)
    {
        if ($request->has('delete_photo') and $request->has('file_id')){
            foreach ($request->input('file_id') as $fid){
                $file=files::find($fid);
                Storage::delete($file->file); //delete Directory of temp folder
                $file->delete();
            }
            return redirect('/users/edit/building/'.$id)->withFlashMassage('تم حذف الصوره بنجاح ');;
        }else{
            $rules=[
                'bu_type' =>  'required',
                'bu_name' =>  'required|string|max:100',
                'bu_price' =>  'required',
                'bu_square' =>  'required|string|max:100',
                'bu_small_dis' =>  'required|string|max:100',
                'bu_meta' =>  'string|max:100',
                'bu_langtude' =>  'required|string|max:100',
                'bu_latetude' =>  'required|string|max:100',
                'bu_status' =>  'string|max:100',
                'bu_rant' =>  'required',
                'bu_large_dis' =>'required|string|max:200',
                'bu_rooms' =>  'required',
                'bu_place'=>'required',
                'photo'=>'mimes:jpg,jpeg,png,svg,gif|max:2048',
                'files.*'=>'mimes:jpg,jpeg,png,svg,gif|max:2048',
            ];
            $data= $this->validate(request(),
                $rules,[],[]
            );

            $data=\request()->except(['files','_method','_token']);
            $bu=  Bu::find($id);
            if ($request->hasFile('photo')){
                Storage::delete($bu->photo); //delete Directory of temp folder
                $data['photo']=$request->photo->store('image/'.$id);
            }
            if (\auth()->user()->admin!=1){
                $data['bu_status']="غير مفعل";
            }
            $data['user_id']=auth()->user()->id;
            if ($request->hasFile('files')){
                foreach ($request->file('files') as $file){
                    $uploadfile=$file->store('image/'.$bu->id);
                    files::create([
                        'user_id'=>auth()->user()->id,
                        'bu_id'=>$bu->id,
                        'path'=>'image/'.$bu->id,
                        'file'=>$uploadfile,
                        'file_name'=>$file->getClientOriginalName(),
                        'size'=>Storage::size($uploadfile),
                    ]);
                }
            }
            Bu::where('id',$bu->id)->update($data); //move from temp folder to id news folder
            return redirect('user/buildingShowall/')->withFlashMassage('تمت التعديل علي العقار بنجاح ');

        }
    }

    public function buildingShow( Bu $bu){
        $user=auth()->user();
        $bu=$bu->where('user_id',$user->id)->where('bu_status' ,'مفعل')->paginate(6);
        return view('website.userbuilding.showUserBu',compact('bu','user')) ;

    }

    public function buildingShowStatuse( Bu $bu){
        $user=auth()->user();
        if ($user->admin==1){
            $bu=$bu->where('bu_status' , 'غير مفعل')->paginate(6);
            return view('website.userbuilding.showUserBu',compact('bu','user')) ;
        }elseif($user->admin==0){
            $bu=$bu->where('user_id',$user->id)->where('bu_status' , 'غير مفعل')->paginate(6);
            return view('website.userbuilding.showUserBu',compact('bu','user')) ;
        }
        return view('/welcome') ;

    }

    public function buildingShowall( Bu $bu){
        $user=auth()->user();
        $bu=$bu->where('user_id',$user->id)->paginate(6);
        return view('website.userbuilding.showUserBu',compact('bu','user')) ;

    }


}
