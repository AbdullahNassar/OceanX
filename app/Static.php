<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Static extends Model
{
    protected $fillable = ['image','site_name_ar','site_name_en','slider_ar','slider_en','about_ar','about_en','about_head_ar','about_head_en','about_content_ar','about_content_en','vision_ar','vision_en','offers_ar','offers_en','initiatives_ar','initiatives_en','initiatives_content_ar','initiatives_content_en','consulting_ar','consulting_en','consulting_content_ar','consulting_content_en','services_ar','services_en','services_head_ar','services_head_en','services_content_ar','services_content_en','contact_head_ar','contact_head_en','contact_content_ar','contact_content_en'];

    public function get($value)
    {
        $data = DB::table('statics')
            ->select($value)
            ->first();

    if($data)
        return $data->$value;
    return '';
    }
}
