@extends('admin.layouts.layout')
 @section('title')
الرد علي الرساله
{{$contact->contact_name}}
 @endsection

 @section('header')

 @endsection



 @section('content')
 <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <ol class="breadcrumb " style="float: left">
                         <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسيه</a></li>
                         <li class="breadcrumb-item "><a href="{{url('/adminpanel/contact')}}"> </a> التحكم في الرسائل</li>
                         <li class="breadcrumb-item active"><a href="{{url('/adminpanel/contact/'.$contact->id.'edit')}}"> </a> تعديل الرساله
 {{$contact->contact_name}}  </li>
                     </ol>
                 </div>
                 <div class="col-sm-6">
                     <h1 style="float: right">
                                        تعديل الرساله
                                         {{$contact->contact_name}}
                     </h1>
                 </div>

             </div>
         </div><!-- /.container-fluid -->
     </section>
 <div class="container">
         <div class="row">
             <div class="col-md-12 col-md-offset-2" style=" margin-bottom: 26px;">
                 <div class="panel panel-default">
                 <div class="card-header">
                         <h3 class="card-title" style="float: right;">
                         تعديل العضو
                         {{$contact->contact_name}}
                         </h3>
                     </div>
                     <div class="panel-body">
 <!--
        {!! Form::model($contact, ['method' => 'PATCH','action'=>['contactcontroller@update','id'=>$contact->id]]) !!}
 -->
     {!! Form::open(['method' => 'PATCH','action'=>['contactcontroller@update','id'=>$contact->id]]) !!}
                         @csrf
     <div class="form-group">
         {{Form::label('contact_name', 'اسم المرسل  ' ,'style = "float: right; margin-right: 10px;"')}}
         {{Form::text('contact_name', $contact->contact_name,['class' => 'form-control','placeholder'=>'اسم المريل' ,'style = "text-align: right;"'])}}
     </div>
     <div class="form-group">
         {{Form::label('contact_email', 'البريد الالكتروني' ,'style = "float: right; margin-right: 10px;"')}}
         {{Form::text('contact_email', $contact->contact_email ,['class' => 'form-control','placeholder'=>'الايميل' ,'style = "text-align: right;"'])}}
     </div>
     <div class="form-group">
         {{Form::label('contact_subject', 'موضوع الرساله' ,'style = "float: right; margin-right: 10px;"')}}
         {{Form::text('contact_subject', $contact->contact_subject ,['class' => 'form-control','placeholder'=>'محتوي الرساله' ,'style = "text-align: right;"'])}}
     </div><div class="form-group">
         {{Form::label('contact_massage', 'الرساله' ,'style = "float: right; margin-right: 10px;"')}}
         {{Form::textarea('contact_massage', $contact->contact_massage ,['class' => 'form-control','placeholder'=>'الرساله' ,'style = "text-align: right;"'])}}
     </div>





     {{Form::submit('حفظ التعديل ',['class'=>'btn btn-primary' ,'style = "float: right; margin-right: 10px;"'])}}
 {!! Form::close() !!}





<br>

<div class="clearfix"></div>


                     </div>
                 </div>
             </div>
         </div>
 </div>


 @endsection




 @section('footer')



 @endsection
