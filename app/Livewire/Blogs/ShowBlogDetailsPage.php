<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Settings;

class ShowBlogDetailsPage extends Component
{

    public $blogDetail;

    public function mount($slug)
    {
        $this->blogDetail = Blog::where('is_active',1)->where('slug',$slug)->first();
    }
    
    
    
    public function render()
    {
        if ($this->blogDetail)
        {

            // $related_blog = Blog::where('is_active',1)->whereIn('category_blog_id',$this->blogDetail->categoryBlog->id)->inRandomOrder()->take(2)->get();
            $setting = Settings::first();
            $url = url()->current();
            return view('livewire.blogs.show-blog-details-page',['blogDetail'=>$this->blogDetail,'setting'=>$setting,'url'=>$url]);
        }
        
        else
        return abort(404);

    }
}
