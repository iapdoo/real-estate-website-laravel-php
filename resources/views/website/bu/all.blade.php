@extends('layouts.app')
@section('title')
    كل العقارات
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

                @if(isset($array))
                     @if(!empty($array))
            @foreach($array as $key => $value)
                <li> <a href="{{url('/search?'.$key.'='.$value)}}">{{ searchnamefiled()[$key]}} -> {{$value}}</a></li>
                        @endforeach
                     @endif
                @endif
</ol>
                <div class="profile-content">
                    @include('website.bu.sharefill' , ['bu' =>$buall])
                    <div class="text-center">
                        {{$buall->appends(Request::except('page'))->render()}}
                    </div>
                </div>
            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
