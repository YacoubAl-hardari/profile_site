<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyExpertArea extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $table = 'myexpertareas';

    protected $fillable = [
        'name',
        'image',
        'is_active'
    ];
}
