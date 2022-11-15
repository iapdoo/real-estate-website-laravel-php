<?php
function getsetting ($settingname ='sitname'){
    return \App\SitSetting::where('namesetting'  ,   $settingname )->get()[0]->value;
}

function checkIfImageExit($imageName){
    if (!empty($imageName)){

        $path=$imageName;

        if (file_exists($path)){
            return $imageName;
        }
    }
    return getsetting('no_image');
//                                   <img src="{{url($bu->photo) }}" class="img-responsive" width="220px" height="100px">
}
function bu_type(){
    $array=[
        'شقه'  ,
        'فيله'  ,
        'شاليه'  ,
    ];
    return $array;
}
function bu_rant(){
    $array=[
        'ايجار'  ,
        'تمليك'  ,
    ];
    return $array;
}
function bu_status(){
    $array=[
        'مفعل '  ,
        'غير مفعل'  ,
    ];
    return $array;
}
function roomnumber(){
    $array=[];
    for($i=2 ;$i<=32; $i++) {
        $array[$i]=$i;
    }
    return $array;
}
function searchnamefiled(){
    return [

        'bu_price'=>'سعر العقار',
        'bu_price_from'=>'سعر العقار من',
        'bu_price_to'=>'سعر العقار الي',
        'bu_rant'=>'نوع العمليه',
        'bu_square'=>'المساحه',
        'bu_type'=>'نوع العقار',
        'bu_rooms'=>'عدد الغرف ',
        'bu_place'=>'منطقه العقار ',
    ];
}
function bu_place(){
  return  [
       'أسوان   ,  مصر '  ,
        'أسيوط   ,  مصر '  ,
         'الأقصر   ,  مصر '  ,
        'الإسكندرية   ,  مصر '  ,
       'الإسماعيلية   ,  مصر '  ,
       'البحر الأحمر   ,  مصر '  ,
       'البحيرة   ,  مصر '  ,
       'الجيزة   ,  مصر '  ,
       'الدقهلية   ,  مصر '  ,
       'السويس   ,  مصر '  ,
       'الشرقية   ,  مصر '  ,
       'الغربية   ,  مصر '  ,
        'الفيوم   ,  مصر '  ,
        'القاهرة   ,  مصر '  ,
        'القليوبية   ,  مصر '  ,
        'المنوفية   ,  مصر '  ,
        'المنيا   ,  مصر '  ,
        'الوادي الجديد   ,  مصر '  ,
        'بني سويف   ,  مصر '  ,
        'بورسعيد   ,  مصر '  ,
        'جنوب سيناء   ,  مصر '  ,
        'دمياط   ,  مصر '  ,
        'سوهاج   ,  مصر '  ,
        'قنا   ,  مصر '  ,
        'كفر الشيخ   ,  مصر '  ,
        'مطروح   ,  مصر '
    ];

}
//notefcation
function unReadMassage(){
    return \App\contact::where('view',null)->get();
}
// notefcatio count
function countunReadMassage(){
    return \App\contact::where('view',null)->count();
}
//notefcation
function unActiveBu(){
    return \App\Bu::where('bu_status','غير مفعل')->get();
}
// notefcatio count
function countunActiveBu(){
    return \App\Bu::where('bu_status','غير مفعل')->count();
}
