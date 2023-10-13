<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLandingSetting extends Model
{
    use HasFactory;

    public $table = 'company_landing_setting';
    protected $fillable = [
        'slide_image_1',
        'slide_image_2',
        'slide_image_3',
        'slide_image_4',
        'title_slide_image_1',
        'description_slide_image_1',
        'title_slide_image_2',
        'description_slide_image_2',
        'title_slide_image_3',
        'description_slide_image_3',
        'title_slide_image_4',
        'description_slide_image_4',
        'about_us',
        'office_phone',
        'personal_phone',
        'email',
    ];
}
