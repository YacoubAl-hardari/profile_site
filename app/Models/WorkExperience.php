<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'workexperiences';

    public $translatable = ['company_name','position'];

    protected $fillable = [
        'company_name',
        'company_logo',
        'start_date',
        'end_date',
        'position',
        'is_active'
    ];
}
