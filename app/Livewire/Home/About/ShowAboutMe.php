<?php

namespace App\Livewire\Home\About;

use App\Models\AboutUs;
use App\Models\Settings;
use Livewire\Component;

class ShowAboutMe extends Component
{
    public function render()
    {
        $sboutMe = AboutUs::first();
        $setting = Settings::select('phone','email','social_links')->first();
        return view('livewire.home.about.show-about-me',compact('sboutMe','setting'));
    }
}
