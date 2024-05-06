<?php

namespace App\Livewire\Home\WorkExperience;

use Livewire\Component;
use App\Models\WorkExperience;

class ShowWorkExperience extends Component
{
    public function render()
    {
        $WorkExperiences = WorkExperience::where('is_active',1)->get();
        return view('livewire.home.work-experience.show-work-experience',compact('WorkExperiences'));
    }
}
