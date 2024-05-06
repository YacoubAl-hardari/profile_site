<?php

namespace App\Livewire\About;

use App\Models\AwardandRecognition;
use Livewire\Component;

class ShowAwardandRecognition extends Component
{
    public function render()
    {
        $AwardandRecognitions = AwardandRecognition::where('is_active',1)->get();
        return view('livewire.about.show-awardand-recognition',compact('AwardandRecognitions'));
    }
}
