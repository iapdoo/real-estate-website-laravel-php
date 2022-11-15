
@extends('layouts.app')
@section('title')
اتصل بنا
@endsection


@section('header')

@endsection



@section('content')

    <br>

    <div class="container">
<section class="mb-4">

        <h1 style="text-align: center"> اتصل بنا </h1>
    <hr>
    <!--Section heading-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">

            {!! Form::open(['url'=>'/contact' , 'method'=>'post']) !!}

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">الاسم </label>
                            <br>
                            <input type="text" id="contact_name" name="contact_name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()? \Illuminate\Support\Facades\Auth::user()->name : ""}}">

                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">الايميل </label>
                            <br>
                            <input type="text" id="contact_email" name="contact_email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()? \Illuminate\Support\Facades\Auth::user()->email : ""}}">

                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">الموضوع </label>
                            <br>
                            <input type="text" id="contact_subject" style="height: 50px;" name="contact_subject" class="form-control">

                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message"> الرساله</label>
<br>
                            <textarea type="text" id="contact_massage" name="contact_massage" rows="10" class="form-control md-textarea"></textarea>

                        </div>

                    </div>
                </div>
                <!--Grid row-->
                <div class="form-group">
                    {!! Form::submit('ارسال الرساله ',['class'=>'btn banner_btn' ,'style'=>"float: right; margin-right: 349px;margin-top: 13px;"]) !!}
                </div>

           {!! Form::close() !!}

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
<h1> مكتبنا </h1>
                <h4>{{getsetting('sitename')}}</h4>

                <hr>

                <li  ><i class="fa fa-map-marker fa-2x" ></i>
                    <h4>{{getsetting('address')}}</h4>
                </li>
                <hr>
                <li ><i class=" mt-4 fa-2x fa fa-mobile-phone" ></i>
                    <h4>{{getsetting('phone')}}</h4>
                </li>
                <hr>
                <li ><i class=" fa fa-envelope mt-4 fa-2x"></i>
                    <h4>{{getsetting('email')}}</h4>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
    </div>
    <br>
@endsection
