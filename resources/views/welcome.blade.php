


        @extends('layouts.app')
        @section('title')
            اهلا بك زائرنا الكريم
            |
            {{getsetting('sitename')}}
        @endsection

        @section('header')

            <link rel="stylesheet" href="{{Request::root()}}/main-product/css/reset.css"> <!-- CSS reset -->
            <link rel="stylesheet" href="{{Request::root()}}/main-product/css/style.css"> <!-- Resource style -->
            <script src="{{Request::root()}}/main-product/js/modernizr.js"></script> <!-- Modernizr -->


        @endsection

@section('content')
        <div class="banner text-center">
            <div class="container">
                <div class="banner-info">
                    <h1>{{getsetting('sitename')}} </h1>
                    <p>{{getsetting('desc')}}</p>
                    <br>

                    {!! Form::open(['url'=>'search' , 'method' => 'get']) !!}
                    <div class="row">
                        <div class="col-lg-3">
                            {!! Form::text("bu_price_from" ,null , [ 'class'=>'form-control', 'style'=>
                             '  margin-top: 7px;', 'placeholder'=>'سعر العقار من '  ]) !!}

                        </div>

                        <div class="col-lg-3">
                            {!! Form::text("bu_price_to" ,null , [ 'class'=>'form-control', 'style'=>
                              '  margin-top: 7px;', 'placeholder'=>'سعر العقار الي '  ]) !!}
                        </div>

                        <div class="col-lg-3">
                            {!! Form::select("bu_rooms"  ,roomnumber(), null , [ 'class'=>'form-control', 'style'=>
                               '  margin-top: 7px;', 'placeholder'=>' عدد الغرف '  ]) !!}
                        </div>

                    <div class="col-lg-3">
                            {!!Form::select("bu_type" ,  ['شقه ' => 'شقه', 'فيله' => 'فيله', 'شاليه' => 'شاليه'] ,null ,[ 'class'=>'form-control', 'style'=>
                               '  margin-top: 7px;', 'placeholder'=>'نوع العقار شقه / فيله / شاليه'  ]) !!}
                    </div>

                    <div class="col-lg-3">
                            {!!Form::select("bu_rant" ,  ['ايجار ' => 'ايجار', 'تمليك' => 'تمليك'],null ,[ 'class'=>'form-control','style'=>
                                       '  margin-top: 7px;', 'placeholder'=>'نوع العمليه  ايجار / تمليك '  ]) !!}
                    </div>
                    <div class="col-lg-3">

                            {!! Form::text("bu_square",null , ['class'=>'form-control', 'style'=>
                                  '  margin-top: 7px;',  'placeholder'=>'المساحه'  ]) !!}
                    </div>

                    <div class="col-lg-3">
                            {!! Form::select("bu_place",bu_place(),null , [ 'class'=>'form-control', 'style'=>
                               '  margin-top: 7px;',  'placeholder'=>'منطقه العقار '  ]) !!}
                    </div>

                    <div class="col-lg-3">
                            {!! Form::submit("ابحث", ['class'=>'banner_btn col-md-12' ,
                            'style'=>"
                            margin-top: 7px;
                            border: lightpink;
                            font-size: large;
                            font-weight: inherit;

                            "]) !!}

                    </div>
                    </div>
                    {!! Form::close()!!}
                    @if(auth()->user())
                          <a class="banner_btn" href="{{url('/user/creat/building')}}">اضف عقار مجانا </a>
                    @endif
                </div>
            </div>

        </div>
            <div class="container">
                    <ul class="cd-items cd-container">
                        <div class="row align-content-center">
                     @foreach(App\Bu::where('bu_status','مفعل')->get() as $bu)


                            <li class="cd-item" >
                                @if(empty($bu->photo))

                                 <img src="{{checkIfImageExit('no_image')}}" style="width: 100%; height: 100%;">

                               @endif
                                <img src="{{$bu->photo}}" alt="{{$bu->bu_name}}" title="{{$bu->bu_name}}">
                                <a href="#0" data-id="{{$bu->id}}" class="cd-trigger" title="{{$bu->bu_name}}">نبذه سريعه  </a>
                            </li> <!-- cd-item -->

                         @endforeach
                        </div>
                    </ul> <!-- cd-items -->

                    <div class="cd-quick-view">
                        <div class="cd-slider-wrapper">
                            <ul class="cd-slider">
                                <li>
                                    <div style="width:300px; height: 300px; ">
                                    <img src="" alt="Product 1" class="imgbox" style="width: 100%; height: 100%;">
                                    </div>
                                </li>
                            </ul> <!-- cd-slider -->

                        </div> <!-- cd-slider-wrapper -->

                        <div class="cd-item-info">
                            <h2 class="titlebox"></h2>
                            <p class="descbox"></p>
                            <ul class="cd-item-action">
                                <li><a href="#0" class="add-to-cart pricebox" ></a></li>
                                <li><a href="#0" class="morebox">المذيد من التفاصيل</a></li>
                            </ul> <!-- cd-item-action -->
                        </div> <!-- cd-item-info -->
                        <a href="#0" class="cd-close">Close</a>
                    </div> <!-- cd-quick-view -->
                </div>







    @endsection
        @section('footer')

            <script src="{{Request::root()}}/main-product/js/jquery-2.1.1.js"></script>
            <script src="{{Request::root()}}/main-product/js/velocity.min.js"></script>
            <script>
                function urlHome() {
                    return '{{Request::root()}}';

                }
                function NoImageurl() {
                    return '{{checkIfImageExit('no_image')}}';

                }
            </script>
            <script src="{{Request::root()}}/main-product/js/main.js"></script> <!-- Resource jQuery -->
            @endsection
