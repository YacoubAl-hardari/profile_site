<?php

namespace App\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Settings;
use App\Models\CategoryBlog;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class ShowBlogPage extends Component
{
    use WithPagination;
    #[Url()]
    public $sortBy;
    #[Url()]
    public $selectedCategory = '';
    #[Url()]
    public $searchQuery = '';


    public function mount()
    {
        $this->selectedCategory = null;
        $this->sortBy = 'desc';
        $this->searchQuery = '';
       
    }

    public function selectCategory($categorySlug)
    {
        $Getcategory = CategoryBlog::where('id', $categorySlug)->first();
        $category = CategoryBlog::where('slug', $Getcategory->slug)->first();

        if ($category) {
            $this->selectedCategory = $category->slug;
            $this->searchQuery = null; // Reset search query
            $this->resetPage();
        } else {
            abort(404);
        }
    }

    public function resetFilters()
    {
        $this->selectedCategory = null;
        $this->searchQuery = null;
    }


    public function render()
    {


        $query = Blog::where('is_active', 1)->with('user', 'categoryBlog');


        if ($this->selectedCategory) {
            $query->WithcategoryBlog($this->selectedCategory);
        }

        if ($this->searchQuery) {

            $locale = App::getLocale();

            $query->where(function ($query) use ($locale) {
                $query->where('name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere(function ($query) use ($locale) {
                        $query->where(DB::raw("JSON_UNQUOTE(JSON_EXTRACT(content, '$." . $locale . ".name'))"), 'like', '%' . $this->searchQuery . '%')
                            ->orWhere(DB::raw("JSON_UNQUOTE(JSON_EXTRACT(content, '$." . $locale . ".content'))"), 'like', '%' . $this->searchQuery . '%');
                    });
            });

        }

            $query->orderBy('date', $this->sortBy);



        $Blogs = $query->paginate(5); // Paginate results, 5 items per page



        $setting = Settings::select('blog_title_page', 'blog_title_page_description')->first();
        return view('livewire.blogs.show-blog-page', compact('setting', 'Blogs'));
    }



}
