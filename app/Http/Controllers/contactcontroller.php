<?php

namespace App\Http\Controllers;

use App\contact;
use App\Http\Requests\contactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class contactcontroller extends Controller
{

    //use contact user in website folder view  website / contact / contact view
    public  function store(contactRequest $request ,contact $contactus){
        $contactus->create($request->all());
        return Redirect::back()->withFlashMassage('تم ارسال رسالتك بنجاح ');

    }

    //use contact admin view admin/contact/ index
    public function index(contact $contact){
        $contact=$contact->all();
        return view('admin.contact.index',compact('contact'));
    }

    //use contact admin view admin/contact/ index
    public function destroy($id,contact $contact){
        $contact->find($id)->delete();
        return redirect('/adminpanel/contact')->withFlashMassage('تمت حذف الرساله بنجاح ');
    }

    //use contact admin view admin/contact/ edit
    public function edit($id)
    {
        $contact=contact::find($id);
        $contact->fill(['view'=>1])->save();
        return view('admin.contact.edit',compact('contact'));
    }

    //use contact admin view admin/contact/ update
    public function update($id,  Request $contactRequest)
    {
        $contactupdate= contact::find($id);
        $contactupdate->fill($contactRequest->all())->save();
        return redirect('/adminpanel/contact')->withFlashMassage('تمت التعديل علي الرساله بنجاح ');

    }
}
