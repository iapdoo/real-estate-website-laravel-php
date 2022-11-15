

    @extends('admin.layouts.layout')
@section('title')
    التحكم في رسائل الموقع
    @endsection

@section('header')
    {!! Html::Style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}
    @endsection






@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb " style="float: left">

                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/users')}}"> </a>    التحكم في رسائل الموقع
                        </li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسيه
                                <i class="nav-icon fas fa-tachometer-alt" style="float: right;margin-top: 6px; margin-left: 4px;"></i>
                            </a></li>
                    </ol>
                </div>
                 <div class="col-sm-6">
        <h1 style="float: right">    التحكم في رسائل الموقع
        </h1>
    </div>

    </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th>اسم المرسل </th>
                            <th>البريد الالكتروني</th>
                            <th>الحاله </th>
                            <th> تمت الاضافه في </th>
                            <th>محتوي الرساله</th>
                            <th>نوع الرساله</th>
                            <th>التحكم في الرسائل</th>

                            </tr>
                            </thead>
                            <tbody>
                           @foreach($contact as $contactinfo)
                            <tr>

                                <td>{{$contactinfo->contact_name}}</td>
                                <td>{{$contactinfo->contact_email}}</td>
                                <td>{{$contactinfo->contact_subject}}</td>
                                <td>{{ $contactinfo->created_at }}</td>
                                 <td>{{ $contactinfo->contact_massage }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{url ('/adminpanel/contact/'.$contactinfo->id.'/delete')}}"
                                       style="display: block;margin-bottom: 5px;"> ازاله الرساله </a>
                                    <a class="btn btn-primary" href="{{ url ('/adminpanel/contact/'. $contactinfo->id .'/edit') }} "
                                       style="display: block;margin-bottom: 5px;"> تعديل الرساله </a>

                                </td>
                                @if($contactinfo->view==Null)
                                    <td>رساله جديده</td>
                                    @else
                                    <td>رساله قديمه</td>
                                    @endif

                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>اسم المرسل </th>
                                <th>البريد الالكتروني</th>
                                <th>الحاله </th>
                                <th> تمت الاضافه في </th>
                                <th>محتوي الرساله</th>
                                <th>نوع الرساله</th>
                                <th>التحكم في الرسائل</th>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @endsection









@section('footer')
    {!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}
    {!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}

    <script type="text/javascript">
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        })
    </script>
@endsection


