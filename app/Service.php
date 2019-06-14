<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['head_ar','head_en','content_ar','content_en','steps_ar','steps_en','image','category_id','active'];
}
