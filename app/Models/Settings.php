<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = [
        'title',
        'description',

        'service_title_page',
        'service_title_page_description',

        'portfolio_title_page',
        'portfolio_title_page_description',

        'blog_title_page',
        'blog_title_page_description',

        'contact_title_page',
        'contact_title_page_description',

        'location',

        'slider_text',
        
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $table = "system_settings";
    
    protected $fillable = [
         'title',
         'description',
         'colors',
         'header_logo',
         'footer_logo',
         'social_links',

         'service_title_page',
         'service_title_page_description',
 
         'portfolio_title_page',
         'portfolio_title_page_description',
 
         'blog_title_page',
         'blog_title_page_description',
 
         'contact_title_page',
         'contact_title_page_description',
 
         'slider_text',
         'phone',
         'email',
         'location',
 
         'meta_title',
         'meta_description',
         'meta_keywords',
         'meta_image',
         'meta_site',
        
    ];

    protected $casts = [
        'colors' => 'json',
        'social_links' => 'json',
        'slider_text' => 'json',
    ];
}
