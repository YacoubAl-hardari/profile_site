<?php

namespace App\Livewire\Services;

use Livewire\Component;
use App\Models\FrequentlyAskedQuestion;

class GetFrequentlyAskedQuestion extends Component
{
    public function render()
    {
        $FrequentlyAskedQuestions = FrequentlyAskedQuestion::where('is_active', 1)->get();
        return view('livewire.services.get-frequently-asked-question',compact('FrequentlyAskedQuestions'));
    }
}
