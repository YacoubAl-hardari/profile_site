<?php

namespace App\Livewire\Portfolios;

use Livewire\Component;
use App\Models\Settings;
use App\Models\Portfolio;
use Livewire\WithPagination;

class ShowPortfoliosPage extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        $Portfolios = Portfolio::where('is_active',1)->paginate(5);
        // return view('livewire.show-posts', [
        //     'posts' => Portfolio::where('is_active',1)->where('name', 'like', '%'.$this->search.'%')->paginate(10),
        // ]);
        $setting = Settings::select('portfolio_title_page','portfolio_title_page_description')->first();
        return view('livewire.portfolios.show-portfolios-page',compact('Portfolios','setting'));
    }
}
