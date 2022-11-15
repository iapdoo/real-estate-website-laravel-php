@extends('layouts.app')
@section('title')
    اضافه عقار جديد
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

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key => $value)
                                <li> <a href="{{url('/search?'.$key.'='.$value)}}">{{ searchnamefiled()[$key]}} -> {{$value}}</a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                <div class="profile-content">
                    @include('website.userbuilding.form' , ['user'=>1])
                </div>
            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
