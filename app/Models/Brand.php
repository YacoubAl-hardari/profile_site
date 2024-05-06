<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'brands';


    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'is_active'
    ];
}
