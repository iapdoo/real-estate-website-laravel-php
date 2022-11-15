@extends('layouts.app')
@section('title')
  تم اضافه عقار بنجاح
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
                    <li> <a href="{{url('/user/creat/building')}}"> اضف عقار جديد </a></li>
                    <li> <a class="active" href="#"> تم الاضافه </a></li>
                </ol>
                <div class="profile-content">
                    <div class="alert alert-success">
                        <b>
                            تم اضافه

                        </b>
                        العقار بنجاح
                    </div>
                </div>
            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
