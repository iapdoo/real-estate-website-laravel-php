<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table='contact';
    protected $fillable=['contact_name', 'contact_email', 'contact_subject', 'contact_massage', 'view', 'contact_type',];
}
