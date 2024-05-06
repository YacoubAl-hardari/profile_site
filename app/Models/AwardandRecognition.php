<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwardandRecognition extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['title','award_or_recognition_type','description'];

    protected $table = 'award_and_recognitions';
    protected $fillable = [
        'title',
        'image',
        'award_or_recognition_type',
        'link_type',
        'link',
        'description',
        'start_date',
        'end_date',
        'is_active'
    ];
}
