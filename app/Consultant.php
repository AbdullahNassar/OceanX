<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $fillable = ['consultant_name_ar','consultant_name_en','consultant_details_ar','consultant_details_en','image','active'];
}
