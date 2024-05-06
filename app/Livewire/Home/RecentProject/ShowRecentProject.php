<?php

namespace App\Livewire\Home\RecentProject;

use App\Models\Portfolio;
use Livewire\Component;

class ShowRecentProject extends Component
{
    public function render()
    {
        $Portfolios = Portfolio::where('is_active',1)->take(3)->get();
        return view('livewire.home.recent-project.show-recent-project',compact('Portfolios'));
    }
}
