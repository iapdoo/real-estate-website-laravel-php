

    @extends('admin.layouts.layout')
@section('title')
    التحكم في العقراتا
@endsection

@section('header')
    {!! Html::Style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::Style('cus/css/select2.css') !!}

@endsection






@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb " style="float: left">

                        <li class="breadcrumb-item active"><a href="{{url('/adminpanel/bu')}}"> </a> التحكم في العقارات </li>
                        <li class="breadcrumb-item"><a href="{{url('/adminpanel')}}">الرئيسيه
                                <i class="nav-icon fas fa-tachometer-alt" style="float: right;margin-top: 6px; margin-left: 4px;"></i>
                            </a></li>
                    </ol>
                </div>
                 <div class="col-sm-6">
        <h1 style="float: right">التحكم في العقارات </h1>
    </div>

    </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                            <th> التحكم </th>
                             <th>الحاله</th>
                             <th>اضيف بواسطه </th>
                             <th>  النوع </th>
                            <th> السعر</th>
                            <th>اسم العقار</th>
                            <th> المساحه</th>
                            <th> عدد الغرف</th>
                            <th>  ايجار\تمليك </th>
                            <th> العنوان</th>
                            <th>الصوره الرئيسيه</th>


                            </tr>
                            </thead>
                            <tbody>
                           @foreach($bul as $bu)
                            <tr>
                            <td>
                                {!! Form::open(['url'=>'/adminpanel/bu/'.$bu->id,'method'=>'delete' ,'style'=>'display:inline']) !!}
                                {!! Form::submit('ازاله',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                 <br> </br>
                                 <a href="{{ url ('/adminpanel/bu/'. $bu->id .'/edit') }} " class="btn btn-primary" > تعديل </a>

                                </td>

                                @if($bu->bu_status==null)
                                    <td>غير مفعل</td>
                                @else
                                    <td>{{$bu->bu_status}}</td>
                                @endif
                                <td>{{ $bu->addby->name }}</td>
                                    <td>{{$bu->bu_type}}</td>
                                <td>{{$bu->bu_price}}</td>
                                <td>{{ $bu->bu_name }}</td>
                                <td>{{$bu->bu_square}} متر مربع</td>
                                <td>{{$bu->bu_rooms}}</td>
                                <td>{{ $bu->bu_rant }}</td>
                                <td>{{ bu_place()[$bu->bu_place] }}</td>
                               <td>
                                   <img src="{{url(checkIfImageExit($bu->photo)) }}" class="img-responsive" width="125px" height="130px">
                               </td>


                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th> التحكم </th>
                                <th>الحاله</th>
                                <th>اضيف بواسطه </th>
                                <th>  النوع </th>
                                <th> السعر</th>
                                <th>اسم العقار</th>
                                <th> المساحه</th>
                                <th> عدد الغرف</th>
                                <th>  ايجار\تمليك </th>
                                <th> العنوان</th>
                                <th>الصوره الرئيسيه</th>

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
    {!! Html::script('cus/js/select2.js') !!}

    <script type="text/javascript">
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });

        $('.select2').select2();
    </script>


@endsection


