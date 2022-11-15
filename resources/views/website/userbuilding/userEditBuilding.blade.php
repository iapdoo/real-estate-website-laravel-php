@extends('layouts.app')
@section('title')
تعديل العقار
    {{$bu->bu_name}}
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
                    <li> <a href="{{url('/user/buildingShowStatuse')}}"> عقارات في انتظار التفعيل   </a></li>
                    <li> <a href="{{url('/users/edit/building/'.$bu->id)}}">   تعديل العقار </a></li>

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key => $value)
                                {{-- searchnamefiled() function in helper file  get search name filed--}}
                                <li> <a href="{{url('/search?'.$key.'='.$value)}}">{{ searchnamefiled()[$key]}} -> {{$value}}</a></li>
                            @endforeach
                        @endif
                    @endif
                </ol>
                <div class="profile-content">
                    {!! Form::open(['url'=>'/users/update/building/'.$bu->id,'files'=>true ,'method'=>'post']) !!}
                    <div class="form-group">
                        {{Form::label('bu_name', 'اسم العقار ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_name',$bu->bu_name,['class' => 'form-control','placeholder'=>'اسم العقار' ,'style = "text-align: right;"'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('photo', 'صوره  العقار  ','style = "float: right; margin-right: 10px;"' )}}

                        {{Form::file('photo' ,['class' => 'form-control ','placeholder'=>'صوره العقار ' ,'style = "text-align: right;"'])}}

                        @if($bu->photo !='' )
                            <img src="{{url('/'.$bu->photo)}}" style="width: 100px;height: 100px">
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('files','صور اضافيه ' ,'style = "float: right; margin-right: 10px;"') !!}
                        {!! Form::file('files[]',['class'=>'form-control','multiple'=>'yes']) !!}
                        @foreach($bu->files()->get() as $file)
                            <div class=" col-lg-4" style="float: right;">
                                <label>
                                    <img src="{{url($file->file)}}" style="width: 220px;height: 100px">
                                    <input type="checkbox" name="file_id[]" value="{{$file->id}}">
                                    <small>{{$file->file_name}}</small>
                                </label>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                        @if($bu->files()->count() > 0 )
                            {!! Form::submit('delete photo ',['class'=>'btn btn-danger','name'=>'delete_photo']) !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {{Form::label('bu_rooms', 'عدد الغرف ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{-- roomnumber() function in helper file  get room number--}}
                        {{Form::select('bu_rooms',roomnumber(),$bu->bu_rooms,['class' => 'form-control','placeholder'=>'عدد الغرف' ,'style = "text-align: right;"'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('bu_place', 'منطقه العقار  ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{-- bu_place() function in helper file  get building place--}}
                        {{Form::select('bu_place',bu_place() , $bu->bu_place,['class' => 'form-control select2 ','placeholder'=>'منطقه العقار ' ,'style = "text-align: right;"'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('bu_price', 'السعر ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_price', $bu->bu_price,['class' => 'form-control','placeholder'=>'السعر' ,'style = "text-align: right;"'])}}
                    </div>
                    <div class="form-group" style=" margin-bottom: 47px;">
                        {{Form::label('bu_rant', 'نوع العمليه' , 'style = "float: right; margin-right: 10px;"')}}
                        {!!Form::select('bu_rant' ,  ['ايجار ' => 'ايجار', 'تمليك' => 'تمليك'], $bu->bu_rant ,['class'=>'form-control','style = " text-align: right;"']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('bu_square', ' المساحه ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_square', $bu->bu_square,['class' => 'form-control','placeholder'=>'المساحه ' ,'style = "text-align: right;"'])}}
                    </div>

                    <div class="form-group" style=" margin-bottom: 47px;">
                        {{Form::label('bu_type', 'نوع العقار ' , 'style = "float: right; margin-right: 10px;"')}}
                        {!!Form::select('bu_type' , ['شقه'=>'شقه','فيله '=>'فيله','شاليه'=>'شاليه'], $bu->bu_type ,['class'=>'form-control','style = " text-align: right;"']) !!}
                    </div>
                    @if($user->admin==1)
                    <div class="form-group" style=" margin-bottom: 47px;">
                        {{Form::label('bu_status', 'حاله العقار ' , 'style = "float: right; margin-right: 10px;"')}}
                        {!!Form::select('bu_status' ,  ['مفعل' => 'مفعل', 'غير مفعل' => 'غير مفعل' , ], $bu->bu_status ,['class'=>'form-control','style = " text-align: right;"']) !!}
                    </div>
                    @endif
                    @if($user->admin==1)
                    <div class="form-group">
                        {{Form::label('bu_meta', '  الكلمات الدلاليه' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_meta', $bu->bu_meta,['class' => 'form-control','placeholder'=>'bu_meta' ,'style = "text-align: right;"'])}}
                    </div>
                    @endif

                    <div class="form-group">
                        {{Form::label('bu_small_dis', 'وصف العقار قصير للعقار ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_small_dis', $bu->bu_small_dis,['class' => 'form-control','placeholder'=>'وصف العقار قصير للعقار' ,'style = "text-align: right;"'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('bu_langtude', 'خط الطول' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_langtude', $bu->bu_langtude,['class' => 'form-control','placeholder'=>'bu_langtude' ,'style = "text-align: right;"'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('bu_latetude', 'دائره العرض' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::text('bu_latetude', $bu->bu_latetude,['class' => 'form-control','placeholder'=>'bu_small_dis' ,'style = "text-align: right;"'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('bu_large_dis', ' وصف مطول للعقار ' ,'style = "float: right; margin-right: 10px;"')}}
                        {{Form::textarea('bu_large_dis', $bu->bu_large_dis,['class' => 'form-control','placeholder'=>'bu_large_dis' ,'style = "text-align: right;"'])}}
                    </div>

                    {{Form::submit('حفظ العقار ',['class'=>'btn btn-primary' ,'style = "float: right; margin-right: 10px;"'])}}
                    {!! Form::close() !!}



                </div>
            </div>
            @include('website.bu.pages')

        </div>

    </div>
@endsection
