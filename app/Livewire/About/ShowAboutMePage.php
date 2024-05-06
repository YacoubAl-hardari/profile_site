<?php

namespace App\Livewire\About;

use App\Models\AboutUs;
use Livewire\Component;

class ShowAboutMePage extends Component
{
    public function render()
    {
        $sboutMe = AboutUs::first();
        return view('livewire.about.show-about-me-page',compact('sboutMe'));
    }
}
