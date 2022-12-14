
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>

        لوحه التحكم الرئيسيه |

        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    {!! Html::style('admin/plugins/fontawesome-free/css/all.min.css') !!}

    <!-- Ionicons -->

    <!-- Tempusdominus Bbootstrap 4 -->
    {!! Html::style('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}

    <!-- iCheck -->
    {!! Html::style('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}

    <!-- JQVMap -->
    {!! Html::style('admin/plugins/jqvmap/jqvmap.min.css') !!}

    <!-- Theme style -->
    {!! Html::style('admin/dist/css/adminlte.min.css') !!}

    <!-- overlayScrollbars -->
    {!! Html::style('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}

    <!-- Daterange picker -->
    {!! Html::style('admin/plugins/daterangepicker/daterangepicker.css') !!}

    <!-- summernote -->
    {!! Html::style('admin/plugins/summernote/summernote-bs4.css') !!}


    {!! Html::style('cus/sweetalert2.css') !!}
    {!! Html::Style('cus/css/select2.css') !!}

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">{{countunReadMassage()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @if(countunReadMassage() != null)
                <div style="text-align: center">
لديك                    {{countunReadMassage()}}رساله غير مقروءه
                </div>
                @endif
                    <!-- Message Start -->
                    @foreach(unReadMassage() as $keyMassage => $massage)
                    <a href="{{url('/adminpanel/contact/'.$massage->id.'/edit')}}" class="dropdown-item">
                    <div class="media">
                        <img src="{{Request::root()}}/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{$massage->contact_name}}
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">{{$massage->contact_massage}}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$massage->created_at}}</p>
                        </div>
                    </div>

                    <!-- Message End -->
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="{{url('/adminpanel/contact')}}" class="dropdown-item dropdown-footer">اظهار كل الرسالئل</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">{{countunActiveBu()}}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">لديك :  {{countunActiveBu()}}  عقار في انتظار التفعيل </span>
                <div class="dropdown-divider"></div>
                @foreach(unActiveBu() as $keyBuilding => $Building)
                    <a href="{{url('/adminpanel/bu/'.$Building->id.'/edit')}}" class="dropdown-item">
                    <i class="fas fa-building mr-2"></i> {{$Building->bu_name}}
                    <span class="float-right text-muted text-sm">{{$Building->addby->name}}</span>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="/user/buildingShowStatuse" class="dropdown-item dropdown-footer">اظهار كل العقارات الغير مفعله </a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{Request::root()}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8;float: right;    margin-top: 1px;">
        <span class="brand-text font-weight-light" style="margin-left: 28px;">لوحه التحكم الرئيسيه </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="flex-flow: row-reverse;">
            <div class="image" >
                <img src="{{Request::root()}}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">

                        <p style=" float: right;">
                            القائمه الرئيسيه
                            @include('/admin/layouts/nav')
                        </p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<div class="content-wrapper">

@yield('content')
</div>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.2
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<!-- ./wrapper -->




<!-- jQuery -->
{!! Html::script('admin/plugins/jquery/jquery.min.js') !!}
{!! Html::script('admin/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
{!! Html::script('admin/plugins/chart.js/Chart.min.js') !!}















<!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->


<!-- ChartJS -->

<!-- Sparkline -->
{!! Html::script('admin/plugins/sparklines/sparkline.js') !!}

<!-- JQVMap -->
{!! Html::script('admin/plugins/jqvmap/jquery.vmap.min.js') !!}
{!! Html::script('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') !!}

<!-- jQuery Knob Chart -->
{!! Html::script('admin/plugins/jquery-knob/jquery.knob.min.js') !!}

<!-- daterangepicker -->
{!! Html::script('admin/plugins/moment/moment.min.js') !!}
{!! Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!}

<!-- Tempusdominus Bootstrap 4 -->
{!! Html::script('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}

<!-- Summernote -->
{!! Html::script('admin/plugins/summernote/summernote-bs4.min.js') !!}

<!-- overlayScrollbars -->
{!! Html::script('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}

<!-- AdminLTE App -->
{!! Html::script('admin/dist/js/adminlte.js') !!}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('admin/dist/js/pages/dashboard.js') !!}

<!-- AdminLTE for demo purposes -->
{!! Html::script('admin/dist/js/demo.js') !!}
{!! Html::script('cus/sweetalert2.all.js') !!}
{!! Html::script('cus/sweetalert2.js') !!}
{!! Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
    $('.select2').select2();
</script>
@include('/admin/layouts/f_massage')


@yield('footer')
</body>
</html>
