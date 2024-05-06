<?php

namespace App\Livewire\Home\ServicesIOffered;

use App\Models\Service;
use Livewire\Component;

class ShowServicesIOffered extends Component
{
    public function render()
    {
        $Services = Service::where('is_active',1)->get();
        return view('livewire.home.services-i-offered.show-services-i-offered',compact('Services'));
    }
}
