<?php

namespace App\Http\Controllers;

use App\Bu;
use App\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBuildingController extends Controller
{

    public function index(Bu $bul){
        $bul=$bul->all();
        return view('admin.bu.index',compact('bul'));
    }

    public function create(Bu $bul){
        return view('admin.bu.add',compact('bul'));
    }

    protected function store(Request $request ,Bu $bul)
    {
        $rules=[

            'bu_type' =>  'required',
            'bu_name' =>  'required|string|max:100',
            'bu_price' =>  'required',
            'bu_square' =>  'required|string|max:100',
            'bu_small_dis' =>  'required|string|max:100',
            'bu_meta' =>  'required|string|max:100',
            'bu_langtude' =>  'required|string|max:100',
            'bu_latetude' =>  'required|string|max:100',
            'bu_status' =>  'required|string|max:100',
            'bu_rant' =>  'required',
            'bu_large_dis' =>  'required|string|max:200',
            'bu_rooms' =>  'required',
            'bu_place'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'files.*'=>'required|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ];
        $data= $this->validate(request(),
            $rules,[],[]
        );
        $tempfolder=  time();
        $data['photo']=$request->photo->store('image/'.$tempfolder);
        $data['user_id']=auth()->user()->id;

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

        return redirect('adminpanel/bu')->withFlashMassage('تمت اضافه علي  العقار  بنجاح ');
    }

    public function destroy($id){
        Bu::find($id)->delete();
        Storage::deleteDirectory('image/'.$id);
        return redirect('/adminpanel/bu')->withFlashMassage('تم حذف العقار بنجاح ');
    }

    public function edit($id)
    {
        $bul=Bu::find($id);
        return view('admin.bu.edit',compact('bul'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('delete_photo') and $request->has('file_id')){
            foreach ($request->input('file_id') as $fid){
                $file=files::find($fid);
                Storage::delete($file->file); //delete Directory of temp folder
                $file->delete();
            }
            return redirect('adminpanel/bu/'.$id.'/edit')->withFlashMassage('تم حذف الصوره بنجاح ');;
        }else{
            $rules=[
                'bu_type' =>  'required',
                'bu_name' =>  'required|string|max:100',
                'bu_price' =>  'required',
                'bu_square' =>  'required|string|max:100',
                'bu_small_dis' =>  'required|string|max:100',
                'bu_meta' =>  'required|string|max:100',
                'bu_langtude' =>  'required|string|max:100',
                'bu_latetude' =>  'required|string|max:100',
                'bu_status' =>  'required|string|max:100',
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
            return redirect('/adminpanel/bu')->withFlashMassage('تمت التعديل علي العقار بنجاح ');

        }
    }

    public function delete($id){
        Bu::find($id)->delete();
        Storage::deleteDirectory('image/'.$id);
        return redirect('/showallbulding')->withFlashMassage('تم حذف العقار بنجاح ');
    }

    public function getAjaxinformation(Request $request, Bu $bu)
    {
        return $bu->find($request->id)->tojson();
    }
}
