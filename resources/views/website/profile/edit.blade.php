@extends('layouts.app')
@section('title')
تعديل المعلومات الشخصيه للعضو
    {{$user->name}}
@endsection


@section('header')

    {!! Html::style('cus/buall.css') !!}
@endsection



@section('content')


    <div class="container">
        <div class="row profile">

            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li> <a href="{{url('/')}}"> الرئيسيه </a></li>
                    <li class="active"> <a href=""> تعديل المعلومات الشخصيه للعضو
                            {{$user->name}} </a></li>

                </ol>

                <div class="profile-content">
                {{-- start change user email / name  --}}

                <!--
                       {!! Form::model($user, ['action'=>['UsersController@userUpdatProfil','id'=>$user->id]]) !!}
                        -->
                        {!! Form::open(['method' => 'PATCH','action'=>['UsersController@userUpdatProfil','id'=>$user->id]]) !!}
                        <div class="form-group">
                            {{Form::label('name', 'الاسم ' ,'style = "float: right; margin-right: 10px;"')}}
                            {{Form::text('name', $user->name,['class' => 'form-control','placeholder'=>'Name' ,'style = "text-align: right;"'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'البريد الالكتروني' ,'style = "float: right; margin-right: 10px;"')}}
                            {{Form::text('email', $user->email ,['class' => 'form-control','placeholder'=>'Email' ,'style = "text-align: right;"'])}}
                        </div>

                        {{Form::submit('حفظ التعديل ',['class'=>'btn btn-primary' ,'style = "float: right; margin-right: 10px; margin-bottom: 20px; "'])}}
                        {!! Form::close() !!}
                    {{-- end change user email / name  --}}

                        {{-- start change password  --}}
<div class="clearfix"></div>
                    {!! Form::open(['method' => 'post','action'=>['UsersController@changepassword']]) !!}
                    <div class="form-group">
                        {{Form::label('password', 'كلمه المرور القديمه ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::password('password',['class' => 'form-control','placeholder'=>'كلمه المرور القديمه ' ,'style = "text-align: right;"'])}}
                    </div><div class="form-group">
                        {{Form::label('newpassword', 'كلمه المرور الجديده ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::password('newpassword',['class' => 'form-control','placeholder'=>'كلمه المرور الجديده ' ,'style = "text-align: right;"'])}}
                    </div>

                    {{Form::submit('حفظ التعديل ',['class'=>'btn btn-primary' ,'style = "float: right; margin-right: 10px; margin-bottom: 20px; "'])}}
                    {!! Form::close() !!}
                        {{-- end change password  --}}

                </div>

            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
