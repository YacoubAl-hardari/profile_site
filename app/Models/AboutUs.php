<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name','description','counter'];
    protected $table = 'about_us';

    protected $fillable = [
        'name',
        'description',
        'image',
        'counter'
    ];

    protected $casts = [
        'counter' => 'array',
    ];

}
