



<div class="col-md-3">
    <div class="profile-sidebar">
        @if(auth()->user())
        <!-- start user profile  -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="active">
                    <h1 style="text-align: center;
                        background: black;
                        color: aliceblue;
                        margin-bottom: initial;
                        margin-top: initial;
                        border: lightpink;/* font-size: large; */
                        font-weight: inherit;
                        border-radius: 23px;"> خيارات العضو</h1>
                </li>
                <li class="active">
                    <a href="/users/editSitting" style=" font-size: 20px;">
                        <i class="fa fa-edit" style="color: #428bca; font-size: 20px;"></i>
                        تعديل المعلومات الشخصيه
                    </a>
                </li>
                <li class="active" >
                    <a href="/user/buildingShowall" style=" font-size: 20px;">
                        <i class="fa fa-building" style="color: #428bca; font-size: 20px;"></i>
                         كل عقاراتي
                    </a>
                </li >
                <li class="active" >
                    <a href="/user/buildingShow" style=" font-size: 20px;">
                        <i class="fa fa-check" style="color: #428bca; font-size: 20px;"></i>
العقارات المفعله
                    </a>
                </li >
                <li class="active" >
                    <a href="/user/buildingShowStatuse" style=" font-size: 20px;">
                        <i class="fa fa-check" style="color: #428bca; font-size: 20px;"></i>
                        العقارات الغير مفعله
                    </a>
                </li >
                <li class="active" >
                    <a href="/user/creat/building" style=" font-size: 20px;">
                        <i class="fa fa-plus" style="color: #428bca; font-size: 20px;"></i>
                        اضف عقار
                    </a>
                </li >
            </ul>
        </div>
        <!-- END MENU -->
        <!-- end user profile  -->
        @endif
            <br>
        <div class="profile-sidebar profile-usertitle-job" style="background-color: #f6f9fb;">
            <h1 style="text-align: center;
                        background: black;
                        color: aliceblue;
                        margin-bottom: initial;
                        margin-top: initial;
                        border: lightpink;/* font-size: large; */
                        font-weight: inherit;
                        border-radius: 23px;">بحث متقدم
            </h1>
            {!! Form::open(['url'=>'search' , 'method' => 'get']) !!}
            <ul class="nav">
                <li>
                    {!! Form::text("bu_price_from" ,null , [ 'class'=>'form-control', 'style'=>
                     '  margin-top: 7px;', 'placeholder'=>'سعر العقار من '  ]) !!}
                </li>
                <li>
                    {!! Form::text("bu_price_to" ,null , [ 'class'=>'form-control', 'style'=>
                      '  margin-top: 7px;', 'placeholder'=>'سعر العقار الي '  ]) !!}
                </li>
                <li>
                    {!! Form::select("bu_rooms"  ,roomnumber(), null , [ 'class'=>'form-control ', 'style'=>
                       '  margin-top: 7px;', 'placeholder'=>' عدد الغرف '  ]) !!}
                </li>
                <li>
                    {!!Form::select("bu_type" ,  ['شقه ' => 'شقه', 'فيله' => 'فيله', 'شاليه' => 'شاليه'] ,null ,[ 'class'=>'form-control', 'style'=>
                       '  margin-top: 7px;', 'placeholder'=>'نوع العقار شقه / فيله / شاليه'  ]) !!}
                </li>
                <li>
                    {!!Form::select("bu_rant" ,  ['ايجار ' => 'ايجار', 'تمليك' => 'تمليك'],null ,[ 'class'=>'form-control','style'=>
                               '  margin-top: 7px;', 'placeholder'=>'نوع العمليه  ايجار / تمليك '  ]) !!}
                </li>
                <li>
                    {!! Form::text("bu_square",null , ['class'=>'form-control', 'style'=>
                          '  margin-top: 7px;',  'placeholder'=>'المساحه'  ]) !!}
                </li>
                <li>
                    {!! Form::select("bu_place",bu_place(),null , ['class'=>'form-control select2', 'style'=>
                      '  margin-top: 7px;',  'placeholder'=>'منطقه العقار '  ]) !!}
                </li>
                <li>
                    {!! Form::submit("ابحث", ['class'=>'banner_btn col-md-12' ,
                    'style'=>"
                    margin-top: 7px;
                    border: lightpink;
                    font-size: large;
                    font-weight: inherit;

                    "]) !!}

                </li>
            </ul>
            {!! Form::close()!!}



        </div>


        <!-- END SIDEBAR USER TITLE -->
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="active">
                    <h1 style="text-align: center;
                        background: black;
                        color: aliceblue;
                        margin-bottom: initial;
                        margin-top: initial;
                        border: lightpink;/* font-size: large; */
                        font-weight: inherit;
                        border-radius: 23px;"> خيارات العقارات</h1>
                </li>
                <li class="active">
                    <a href="/showallbulding" style=" font-size: 20px;">
                        <i class="fa fa-building" style="color: #428bca; font-size: 20px;"></i>
                        كل العقارات
                    </a>
                </li>
                <li class="active" >
                    <a href="/forrent/ايجار" style=" font-size: 20px;">
                        <i class="fa fa-calendar" style="color: #428bca; font-size: 20px;"></i>
                        ايجار
                    </a>
                </li >
                <li  class="active">
                    <a href="/forbay/تمليك" style=" font-size: 20px;">
                        <i class="fa fa-building" style="color: #428bca; font-size: 20px;"></i>
                        تمليك
                    </a>
                </li>
                <li  class="active">
                    <a href="/type/شاليه" style=" font-size: 20px;">
                        <i class="fa fa-institution" style="color: #428bca;font-size: 20px; "></i>
                        شاليه
                    </a>
                </li>
                <li  class="active">
                    <a href="/type/شقه" style=" font-size: 20px;">
                        <i class="fa fa-home" style="color: #428bca; font-size: 20px;"></i>
                        شقه
                    </a>
                </li>
                <li  class="active">
                    <a href="/type/فيله" style=" font-size: 20px;">
                        <i class="fa fa-home" style="color: #428bca; font-size: 20px;"></i>
                        فيله
                    </a>
                </li>

            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
