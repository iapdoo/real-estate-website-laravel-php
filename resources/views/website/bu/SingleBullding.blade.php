@extends('layouts.app')
@section('title')
العقار
{{$buinfo->bu_name}}
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
                    <div class="btn-group " role="group">
                    <div>
                            <h1>
                                اسم العقار :
                                {{$buinfo->bu_name}}
                            </h1>
                            <hr>

                            <a href="{{url('/search?bu_square='.$buinfo->bu_square)}}" class="btn btn-default">
                                المساحه :
                                {{$buinfo->bu_square}}
                            </a>

                        <a href="{{url('/search?bu_price='.$buinfo->bu_price)}}" class="btn btn-default">
                                السعر :
                                {{$buinfo->bu_price}}
                            </a>

                        <a href="{{url('/search?bu_type='.$buinfo->bu_type)}}" class="btn btn-default">
                                نوع العقار :
                                {{$buinfo->bu_type}}
                            </a>

                        <a href="{{url('/search?bu_rant='.$buinfo->bu_rant)}}" class="btn btn-default">
                            نوع العمليه :
                               {{$buinfo->bu_rant}}
                            </a>


                        <a href="{{url('/search?bu_place='.$buinfo->bu_place)}}" class="btn btn-default">
                                منطقه العقار :
                                {{bu_place() [$buinfo->bu_place]}}
                            </a>

                        <a href="{{url('/search?bu_rooms='.$buinfo->bu_rooms)}}" class="btn btn-default">
                                عدد الغرف في العقار :
                                {{$buinfo->bu_rooms}}
                            </a>

                    </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h3>صوره العقار الرئيسيه </h3>
                                    <img src="{{url(checkIfImageExit($buinfo->photo)) }}" class="img-responsive" width="220px" height="200px">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                    </div>
                        <div class="clearfix"></div>

                        @if ($buinfo->files()->count() > 0 )
                            <hr>
                           <h3 style="text-align: center">صور اضافيه للعقار</h3>
                        @endif
                        @foreach($buinfo->files()->get() as $files)
                            <div class="col-lg-4">
                                <img src="{{url('/'.$files->file)}}" style="width: 220px;height: 100px">
                                <small>{{$files->file_name}}</small>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-info">
                            <p>
                                <span style="font-size: 20px ; font-weight: bold">وصف العقار : </span>
                                {{nl2br($buinfo->bu_large_dis) }}
                            </p>
                         </div>

                    </div>
                </div>
                <hr>
                <div class="profile-content">
                    @if ($buinfo->count() != $buinfo->id )
                    <h3>عقارات اخري قد تعجبك</h3>
                    @include('website.bu.sharefill', ['bu'=> $same_rant])
                    @include('website.bu.sharefill', ['bu'=> $same_type])
                    @include('website.bu.sharefill', ['bu'=> $same_status])
                        @endif
                </div>
            </div>


                @include('website.bu.pages')
        </div>

    </div>
@endsection
