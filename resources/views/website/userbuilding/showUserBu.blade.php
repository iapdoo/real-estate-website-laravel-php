@extends('layouts.app')
@section('title')
    @if($user->admin=1)
        اظهر كل العقارات
        @else
    كل عقارات
    {{$user->name}}
    @endif
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
                    <li>
                        @if($user->admin==0)
                            <a href="#">
                                كل عقارات
                                {{$user->name}}
                            </a>
                        @elseif($user->admin==1)
                            <a href="/buildingShowStatuse">
                                كل عقارات الغير مفعله</a>
                        @endif
                        </li>

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key => $value)
                                <li> <a href="{{url('/search?'.$key.'='.$value)}}">{{ searchnamefiled()[$key]}} -> {{$value}}</a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                <div class="profile-content">
                    @include('website.bu.sharefill' , ['bu' =>$bu])
                    <div class="text-center">
                        {{$bu->appends(Request::except('page'))->render()}}
                    </div>
                </div>
            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
