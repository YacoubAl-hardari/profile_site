<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryBlog extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'categories';

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'slug',
        'text_color',
        'bg_color',
        'is_active'
    ];


    public function Blog()
    {
        return $this->belongsToMany(Blog::class,'category_posts')->withTimestamps();
    }


}
