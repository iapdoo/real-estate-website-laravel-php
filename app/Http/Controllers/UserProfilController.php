<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Http\Requests\userUpdatePassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfilController extends Controller
{
    public function userEdit(){
        $user=auth()->user();
        return view('website.profile.edit',compact('user'));
    }

    public function userUpdateProfile( UpdateRequest $request, User $user){
        $user=auth()->user();
        $request['admin']=0;


        if ($request->email != $user->email){
            $checkmail=$user->where('email',$request->email)->count();
            if ($checkmail==0){
                $user->fill($request->all())->save();
            }else{
                return Redirect::back()->withFlashMassage('الرجاء استخدم بيانات اخري');

            }
        }
        else{
            $user->fill(['name'=>$request->name])->save();
        }

        return Redirect::back()->withFlashMassage('تمت التعديل العضو بنجاح ');
    }

    public function changePassword( userUpdatePassword $request, User $user){
        $user=auth()->user();

        if (Hash::check($request->password , $user->password)){
            $hash= Hash::make($request->newpassword);
            $user->fill(['password'=>$hash])->save();
            return Redirect::back()->withFlashMassage('تم تغيير كلمه المرور بنجاح ');

        }else{
            return Redirect::back()->withFlashMassage('الرجاء ادخال كلمه المرور القديمه بطريقه صحيحه ');

        }
    }

}
