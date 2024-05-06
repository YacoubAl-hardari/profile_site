<?php

namespace App\Models;

use App\Models\User;
use App\Models\TagBlog;
use App\Models\CategoryBlog;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,HasTranslations;
    protected $table = 'blogs';


    public $translatable = ['name','content','meta_title','meta_description','meta_keywords','','','',''];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'image',
        'time_of_read',
        'counter_view',
        'date',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function categoryBlog()
    {
        return $this->belongsToMany(CategoryBlog::class,'category_posts')->withTimestamps();
    }
    public function scopeWithcategoryBlog($query,  $category)
    {
       
        return $query->whereHas('categoryBlog', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }
  

    
    public function getReadTime()
    {
        $mins = round(str_word_count($this->content) / 250);

        if($mins < 1)
       return 1;
    else 
    return $mins; 

       
    }
    
    public function getContent()
    {
        $contentWithPlaceholder = preg_replace('/(&nbsp;|\xC2\xA0|&#160;)/', '___NBSP___', $this->content);
    
        $strippedContent = strip_tags($contentWithPlaceholder);
    
        $limitedContent = mb_substr($strippedContent, 0, 150);
    
        $contentWithNbsp = str_replace('___NBSP___', '&nbsp;', $limitedContent);
    
        return $contentWithNbsp;
    }
    
    


   
}
