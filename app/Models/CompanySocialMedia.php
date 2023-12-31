<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySocialMedia extends Model
{
    use HasFactory;

    public $table = 'company_social_media';
    protected $fillable = [
        'title',
        'icon',
        'link',
    ];
}
