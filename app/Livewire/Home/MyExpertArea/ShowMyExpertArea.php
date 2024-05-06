<?php

namespace App\Livewire\Home\MyExpertArea;

use Livewire\Component;
use App\Models\MyExpertArea;

class ShowMyExpertArea extends Component
{
    public function render()
    {
        $MyExpertAreas = MyExpertArea::where('is_active',1)->get();
        return view('livewire.home.my-expert-area.show-my-expert-area',compact('MyExpertAreas'));
    }
}
