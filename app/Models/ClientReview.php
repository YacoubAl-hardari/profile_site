<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientReview extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'client_reviews';

    public $translatable = ['name','position','description'];

    protected $fillable = [
        'name',
        'position',
        'start',
        'description',
        'link',
        'is_active'
    ];
}
