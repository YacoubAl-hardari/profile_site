<?php

namespace App\Models;

use App\Models\CategoryPortfolio;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'portfolios';


    public $translatable = ['name','description','content','client','meta_title','meta_description','meta_keywords'];


    protected $fillable = [
        'category_portfolio_id',
        'name',
        'slug',
        'image',
        'description',
        'date',
        'content',
        'images',
        'client',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_active',
    ];

    public function categoryPortfolio()
    {
        return $this->belongsTo(CategoryPortfolio::class,'category_portfolio_id');
    }

    protected $casts = [
        'images'=>"array",
        'client'=>"array"
];
}
