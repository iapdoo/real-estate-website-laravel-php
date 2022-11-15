@if(count($bu )> 0)
            @foreach($bu as $key=>$b)
                @if($key %3 == 0 && $key != 0 )
                    <div class="clearfix ">

                    </div>
                @endif
            <div class="col-md-4 pull-right">
                <div class="productbox" style="height: 510px;">


                        @if(empty($b->photo))
                            <img src="{{checkIfImageExit('no_image')}}"   style="max-height: 220px;margin: auto;">
                        @elseif($b->photo !='')
                          <img src="../{{checkIfImageExit($b->photo)}}" class="img-responsive"   style="max-height: 220px;margin: auto;">
                         @endif
                    <div class="producttitle">اسم العقار: {{$b->bu_name}}</div>
                    <div class="producttitle">عدد الغرف :{{$b->bu_rooms}} </div>
                    <div class="producttitle">منطقه العقار: {{bu_place()[$b->bu_place]}}</div>
                    <p class="text-justify">وصف مصغر للعقار :{{str_limit($b->bu_small_dis ,30)}}  </p>
                    <div class="productprice"><p>مساحه العقار:  {{$b->bu_square}}</p>
                        <div class="pricetext"><p> سعر العقار :{{$b->bu_price}} </p> </div>
                        <div class="pull-left">
                         @if(!auth()->guest())
                                    @if($b->bu_status=='غير مفعل' && auth()->user()->id==$b->user_id)
                                        <a  href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-success btm-sm" role="button">
                                            هذا العقار في انتظار الموافقه
                                        </a>
                                        <a href="{{url('/users/edit/building/'.$b->id)}}" class="btn btn-success btm-sm" style="background-color: grey">
                                            تعديل<i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('/SingleBuilding/delete/'.$b->id)}}" class="btn btn-primary btm-sm" role="button" style="margin-top: 5px;">
                                            ازاله<i class="fa fa-remove" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                    @elseif($b->bu_status=='غير مفعل' && auth()->user()->admin==1)
                                        <a  href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-danger btm-sm" role="button">
                                            هذا العقار في انتظار الموافقه
                                        </a>
                                        <a href="{{url('/users/edit/building/'.$b->id)}}" class="btn btn-success btm-sm" style="background-color: grey">
                                            تعديل<i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('/SingleBuilding/delete/'.$b->id)}}" class="btn btn-primary btm-sm" role="button" style="margin-top: 5px;">
                                            ازاله<i class="fa fa-remove" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                    @elseif($b->bu_status=='غير مفعل')
                                        <a  href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-danger btm-sm" role="button">
                                            هذا العقار في انتظار الموافقه
                                        </a>
                                    @elseif($b->bu_status=='مفعل' && auth()->user()->admin==1)
                                        <a href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-primary btm-sm" role="button" style="padding-left: inherit;">
                                            اظهر التفاصيل  <i class="fa fa-plus" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                        <a href="{{url('/SingleBuilding/delete/'.$b->id)}}" class="btn btn-primary btm-sm" role="button" style="margin-top: 0px;padding-left: inherit;">
                                            ازاله<i class="fa fa-remove" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                        <a href="{{url('/users/edit/building/'.$b->id)}}" class="btn btn-success btm-sm" style="background-color: grey">
                                            تعديل<i class="fa fa-edit"></i>
                                        </a>
                                    @elseif($b->bu_status=='مفعل'&& auth()->user()->id==$b->user_id)
                                        <a href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-primary btm-sm" role="button">
                                            اظهر التفاصيل  <i class="fa fa-plus" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                        <a href="{{url('/users/edit/building/'.$b->id)}}" class="btn btn-success btm-sm" style="background-color: grey">
                                            تعديل<i class="fa fa-edit"></i>
                                        </a>
                                    @else
                                        <a href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-primary btm-sm" role="button">
                                            اظهر التفاصيل  <i class="fa fa-plus" style="color: whitesmoke;">
                                            </i>
                                        </a>
                                    @endif
                             @elseif(auth()->guest() && $b->bu_status=='مفعل')
                                <a href="{{url('SingleBullding/'.$b->id)}}" class="btn btn-primary btm-sm" role="button">
                                    اظهر التفاصيل  <i class="fa fa-plus" style="color: whitesmoke;">
                                    </i>
                                </a>
                            @elseif(auth()->guest() && $b->bu_status=='غير مفعل')
                                <a  href="{{url('showSingleBulldingguest/'.$b->id)}}" class="btn btn-danger btm-sm" role="button">
                                    هذا العقار في انتظار الموافقه
                                </a>
                             @endif

                        </div>

                    </div>
                </div>
            </div>
    @endforeach
    @else
        <div class="alert alert-danger">
لا يوجد اي عقار
        </div>
@endif
