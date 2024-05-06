<?php

namespace App\Livewire\About;

use App\Models\ClientReview;
use Livewire\Component;

class ShowClient extends Component
{
    public function render()
    {
        $clients = ClientReview::where('is_active',1)->get();
        return view('livewire.about.show-client',compact('clients'));
    }
}
