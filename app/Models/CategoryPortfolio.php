<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryPortfolio extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'category_portfolios';

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];
}
