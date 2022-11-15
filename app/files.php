<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $table='files';
    protected $fillable=[
        'user_id',
        'bu_id',
        'file',
        'path',
        'size',
        'file_name',
    ];
}
