<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bu extends Model
{
    protected $table="bu";
    protected $fillable =[
        'bu_name', 'bu_price', 'bu_rant','bu_square', 'bu_type', 'bu_small_dis', 'bu_meta', 'bu_langtude',
        'bu_latetude','bu_large_dis', 'bu_status', 'user_id', 'bu_rooms','bu_place','photo',

    ];
    public  function addby(){
        return $this->hasOne('App\User','id','user_id');
    }
    public  function files(){
        return $this->hasMany('App\files','bu_id','id');
    }

}
