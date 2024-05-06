<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrequentlyAskedQuestion extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'frequently_asked_questions';
    

    public $translatable = ['question','answer'];



    protected $fillable = [
        'question',
        'answer',
        'is_active'
    ];
}
