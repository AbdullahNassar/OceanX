<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = ['icon','image','initiative_name_ar','initiative_name_en','initiative_content_ar','initiative_content_en','url','active'];
}
