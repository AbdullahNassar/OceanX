<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name_ar','name_en','c_head_ar','c_head_en','active'];
}
