<?php

namespace App\Livewire\About;

use App\Models\Brand;
use Livewire\Component;

class ShowBrand extends Component
{
    public function render()
    {
        $brands = Brand::where('is_active',1)->get();
        return view('livewire.about.show-brand',compact('brands'));
    }
}
