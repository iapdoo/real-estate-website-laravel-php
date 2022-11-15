@extends('layouts.app')
@section('title')
    هذا العقار منتظر الموافقه عليه من الاداره
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
                    <li><a href="{{url('showallbulding')}}"> كل العقارات</a></li>
                    <li><a href="{{url('SingleBullding/'.$buinfo->id)}}">{{$buinfo->bu_name}}</a></li>
                </ol>
                <div class="profile-content">
                   <div class="alert alert-warning">
                       <h1>
                           تنبيه العقار
                           {{$buinfo->bu_name}}
                           تحت المراجعه
                       </h1>
                       <b>
                            تواصل معنا للتفعيل
                       </b>
                       <a href="/contact" style="font-weight: bold"> من هنا </a>
                   </div>
                   </div>
                </div>
            </div>
        </div>
@endsection
