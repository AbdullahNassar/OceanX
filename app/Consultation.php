<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['con_name_ar','con_name_en','con_content_ar','con_content_en','active'];
}
