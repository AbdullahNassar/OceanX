<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = ['statistic_name_ar','statistic_name_en','number','initiative_id','active'];
}
