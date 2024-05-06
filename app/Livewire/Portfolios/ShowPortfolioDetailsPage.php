<?php

namespace App\Livewire\Portfolios;

use App\Models\Portfolio;
use Livewire\Component;

class ShowPortfolioDetailsPage extends Component
{
    public $portfolio;

    public function mount($slug)
    {
        $this->portfolio = Portfolio::where('is_active',1)->where('slug',$slug)->first();
    }

    
    public function render()
    {
        if ($this->portfolio)
        return view('livewire.portfolios.show-portfolio-details-page',['portfolio_detail'=>$this->portfolio]);
        
        else
        return abort(404);

    }
}
