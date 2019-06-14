<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $fillable = ['consult_name','consult_time','consult_date','full_name','phone','email','message','consultant_id'];
}
