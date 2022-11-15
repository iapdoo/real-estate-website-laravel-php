
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- rest of the form -->

                        {!! Form::open(['url'=>'/user/creat/building','files'=>true]) !!}

                        <div class="form-group " style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_name','اسم العقار ') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::text('bu_name',old('bu_name'),['class'=>'form-control','placeholder'=>'اسم العقار',]) !!}
                            </div>
                        </div>
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('photo','الصوره الرئيسيه') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::file('photo',['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right; text-align: left;">
                                {!! Form::label('files','صور اضافيه') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::file('files[]',['class'=>'form-control','multiple'=>'yes']) !!}
                            </div>
                        </div>



                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right; text-align: left;">
                                {!! Form::label('bu_rooms','عدد الغرف') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::select('bu_rooms',roomnumber(),old('bu_rooms'),['class'=>'form-control','placeholder'=>'عدد غرف العقار',]) !!}
                            </div>
                        </div>
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_price','سعر العقار') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::text('bu_price',old('bu_price'),['class'=>'form-control' ,'placeholder'=>'سعر العقار',]) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {{Form::label('bu_rant', 'نوع العمليه' )}}
                            </div>
                            <div class="col-lg-9">
                                {!!Form::select('bu_rant' , bu_rant() ,old('bu_rant'),['class'=>'form-control' ,'placeholder'=>'نوع العمليه',]) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {{Form::label('bu_type', 'نوع العقار' )}}
                            </div>
                            <div class="col-lg-9" >
                                {!!Form::select('bu_type',bu_type(),old('bu_type'),['class'=>'form-control','placeholder'=>'نوع العقار',]) !!}
                            </div>
                        </div>
                        @if(!isset($user))
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {{Form::label('bu_status', 'حاله  العقار' )}}
                            </div>

                            <div class="col-lg-9">
                                {!!Form::select('bu_status' , bu_status() ,['class'=>'form-control ','placeholder'=>'حاله العقار','style="
                                                                                                            border: 1px solid#cbcbcb;
                                                                                                            width: -webkit-fill-available;
                                                                                                            height: 35px;
                                                                                                            border-radius: 5px;"']) !!}
                            </div>
                        </div>
                        @endif
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_square','مساحه العقار') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::text('bu_square',old('bu_square'),['class'=>'form-control' ,'placeholder'=>'مساحه العقار']) !!}
                            </div>
                        </div>
                        @if(!isset($user))
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_meta','الكلمات الدلاليه  ') !!}
                            </div>
                            <div class="col-lg-9">
                                {!! Form::text('bu_meta',old('bu_meta'),['class'=>'form-control','placeholder'=>'الكلمات الدلاليه للعقار']) !!}
                            </div>
                        </div>
                        @endif
                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_place','منطقه العقار') !!}
                            </div>
                            <div class="col-lg-9">
                                {!!Form::select('bu_place' ,bu_place(), null  ,['class'=>'form-control select2','placeholder'=>'منطقه العقار ','style = " text-align: right;"']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_small_dis','وصف مصغر للعقار') !!}
                            </div>
                            <div class="col-lg-9">
                                {!!Form::text('bu_small_dis' , old('bu_small_dis') ,['class'=>'form-control ','placeholder'=>'وصف مصغر للعقار','style = " text-align: right;"']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_langtude','خط الطول') !!}
                            </div>
                            <div class="col-lg-9 ">
                                {!!Form::text('bu_langtude' , old('bu_langtude')  ,['class'=>'form-control ','placeholder'=>'خط الطول  ','style = " text-align: right;"']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_latetude','دائره العرض  ') !!}
                            </div>
                            <div class="col-lg-9">
                                {!!Form::text('bu_latetude' , old('bu_latetude')  ,['class'=>'form-control ','placeholder'=>'دائره العرض  ','style = " text-align: right;"']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            <div class=" col-lg-3" style="float: right;text-align: left;">
                                {!! Form::label('bu_large_dis','وصف مطول للعقار') !!}
                            </div>
                            <div class="col-lg-9">
                                {!!Form::textarea('bu_large_dis' , old('bu_large_dis')  ,['class'=>'form-control ','placeholder'=>'وصف مطول للعقار','style = " text-align: right;"']) !!}
                            </div>
                        </div>

                        <div class="form-group" style="height: 26px;">
                            {!! Form::submit('حفظ العقار',['class'=>'btn btn-warning col-lg-3' ,'style'=>"float: right; margin-top: 13px;"]) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>


@section('footer')

    {!! Html::script('cus/js/select2.js') !!}
    <script type="text/javascript">
        $('.select2').select2();
    </script>

@endsection
