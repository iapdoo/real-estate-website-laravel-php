<!DOCTYPE html>
<html lang="en">
<head>
<title>
    |
    @yield('title')

</title>
    @yield('header')
    {!! Html::style('/website/css/bootstrap.min.css') !!}
    {!! Html::style('/website/css/flexslider.css') !!}
    {!! Html::style('/website/css/style.css') !!}
    {!! Html::style('/website/css/font-awesome.min.css') !!}
    {!! Html::style('/website/js/jquery.min.js') !!}
    {!! Html::style('/cus/css/select2.css') !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

</head>
<body id="app-layout" style="direction: rtl">



<div class="header">

    <div class="container">

        <a class="navbar-brand" style="text-transform: uppercase;" href="{{  url('/')  }}">
            <i class="fa fa-paper-plane">
            </i>
        </a>

        <div class="menu pull-left">
            <a class="toggleMenu" href="#">
                <img src="{{Request::root()}}website/images/nav_icon.png" alt="" /> </a>
                <ul class="nav" id="nav">
                    <li class="current"><a href="{{  url('/')  }}">الرئيسيه</a></li>
                    <li ><a href="{{  url('/showallbulding')  }}">كل العقارات</a></li>



                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            اختر نوع العقار <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-sm-left" aria-labelledby="navbarDropdown">
                        @foreach(bu_type() as $keytype => $type)
                            <a class="dropdown-item"  href="{{url('/search?bu_type='.$type)}}">{{bu_type()[$keytype]}}</a>
                        @endforeach
                        </div>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            اختر نوع العمليه <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-sm-left" aria-labelledby="navbarDropdown">
                            @foreach(bu_rant() as $keytype => $type)
                                <a class="dropdown-item" href="{{url('/search?bu_rant='.$type)}}">{{bu_rant()[$keytype]}}</a>
                            @endforeach
                        </div>
                    </li>

                    <li><a href="{{url('/contact')}}">اتصل بنا </a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">تسجيل الدخول </a></li>
                        <li><a href="{{ url('/register') }}">تسجيل عضويه جديده </a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm-left" aria-labelledby="navbarDropdown" style="width: 200px; ">
                                <a class="dropdown-item"  href="{{ url('/users/editSitting') }}">تعديل المعلومات الشخصيه</a>
                                <a class="dropdown-item" href="{{ url('/user/buildingShowall') }}">كل عقاراتي </a>
                                <a class="dropdown-item" href="{{ url('/user/buildingShow') }}">عقاراتي المفعله</a>
                                <a class="dropdown-item" href="{{ url('/user/buildingShowStatuse') }}">عقاراتي الغير مفعله</a>
                                <a class="dropdown-item" href="{{ url('/user/creat/building') }}">اضف عقار </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ trans('admin.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>


                    @endif
                    <div class="clear"></div>
                </ul>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>


@include('layouts.massage')

@yield('content')

<div class="footer">
    <div class="footer_bottom">
        <div class="follow-us">
            <a class="fa fa-facebook social-icon" href="{{getsetting('facebook')}}"></a>
            <a class="fa fa-twitter social-icon" href="{{getsetting('twitter')}}"></a>
            <a class="fa fa-youtube social-icon" href="{{getsetting('youtube')}}"></a>
            <a class="fa fa-linkedin social-icon" href="{{getsetting('linkedin')}}"></a>
            <div class="copy">
                <p>Copyright &copy; 2015 Company Name. Design by <a href="https://www.facebook.com/ibrahim2apdoo" rel="nofollow">Ibrahim Abd ElHafeez</a></p>
            </div>
        </div>
    </div>
</div>
@yield('footer')


{!! Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
    $('.select2').select2();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
{!! Html::script('website/js/responsive-nav.js') !!}
{!! Html::script('website/js/bootstrap.min.js') !!}
{!! Html::script('website/js/jquery.flexslider.js') !!}

</body>
</html>

