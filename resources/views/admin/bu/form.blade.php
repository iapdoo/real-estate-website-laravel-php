
@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

    {!! Form::open(['url'=>'adminpanel/bu','files'=>true]) !!}

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_name','اسم العقار ') !!}
                </div>
                <div class="col-lg-8">
                    {!! Form::text('bu_name',old('bu_name'),['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('photo','الصوره الرئيسيه') !!}
                </div>
                <div class="col-lg-8">
                {!! Form::file('photo',['class'=>'form-control']) !!}
                 </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('files','صور اضافيه') !!}
                </div>
                <div class="col-lg-8">
                {!! Form::file('files[]',['class'=>'form-control','multiple'=>'yes']) !!}
                </div>
            </div>



            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_rooms','عدد الغرف') !!}
                </div>
                <div class="col-lg-8">
                    {!! Form::text('bu_rooms',old('bu_rooms'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_price','سعر العقار') !!}
                </div>
                <div class="col-lg-8">
                    {!! Form::text('bu_price',old('bu_price'),['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {{Form::label('bu_rant', 'نوع العمليه' )}}
                </div>
                <div class="col-lg-8">
                    {!!Form::select('bu_rant' , ['ايجار ' => 'ايجار', 'تمليك' => 'تمليك'], $bul->bu_type ,['class'=>'form-control','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {{Form::label('bu_type', 'نوع العقار' )}}
                </div>
                <div class="col-lg-8">
                    {!!Form::select('bu_type',['شقه'=>'شقه','فيله '=>'فيله','شاليه'=>'شاليه'],$bul->bu_type,['class'=>'form-control','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {{Form::label('bu_status', 'حاله  العقار' )}}
                </div>
                <div class="col-lg-8">
                    {!!Form::select('bu_status' , ['مفعل' => 'مفعل', 'غير مفعل' => 'غير مفعل' , ], $bul->bu_status ,['class'=>'form-control','style = " text-align: right;"']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_square','مساحه العقار') !!}
                </div>
                <div class="col-lg-8">
                    {!! Form::text('bu_square',old('bu_square'),['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_meta','الكلمات الدلاليه  ') !!}
                </div>
                <div class="col-lg-8">
                    {!! Form::text('bu_meta',old('bu_meta'),['class'=>'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_place','منطقه العقار') !!}
                </div>
                <div class="col-lg-8">
                    {!!Form::select('bu_place' ,bu_place(), null  ,['class'=>'form-control select2','placeholder'=>'منطقه العقار ','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_small_dis','وصف العقار لمحركات البحث  ') !!}
                </div>
                <div class="col-lg-8">
                    {!!Form::text('bu_small_dis' , null  ,['class'=>'form-control ','placeholder'=>'وصف العقار لمحركات البحث  ','style = " text-align: right;"']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_langtude','خط الطول') !!}
                </div>
                <div class="col-lg-8">
                    {!!Form::text('bu_langtude' , null  ,['class'=>'form-control ','placeholder'=>'خط الطول  ','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_latetude','دائره العرض  ') !!}
                </div>
                <div class="col-lg-8">
                    {!!Form::text('bu_latetude' , null  ,['class'=>'form-control ','placeholder'=>'دائره العرض  ','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class=" col-lg-4" style="float: right;">
                    {!! Form::label('bu_large_dis','وصف مطول للعقار') !!}
                </div>
                <div class="col-lg-8">
                    {!!Form::textarea('bu_large_dis' , null  ,['class'=>'form-control ','placeholder'=>'وصف مطول للعقار','style = " text-align: right;"']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('حفظ العقار',['class'=>'btn btn-warning' ,'style'=>"float: right; margin-right: 349px;margin-top: 13px;"]) !!}
            </div>

    {!! Form::close() !!}


