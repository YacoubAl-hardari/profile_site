<?php

namespace App\Livewire\Services;

use App\Models\Service;
use App\Models\Settings;
use Livewire\Component;

class ShowAllServicesPage extends Component
{
    public function render()
    {
        $getAllServices = Service::where('is_active',1)->get();
        $setting = Settings::select('service_title_page','service_title_page_description')->first();
        return view('livewire.services.show-all-services-page',compact('getAllServices','setting'));
    }
}
