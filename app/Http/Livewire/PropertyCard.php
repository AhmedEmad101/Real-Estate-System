<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PropertyCard extends Component
{
    public $property;

    public function mount($property)
    {
        $this->property = $property;
    }

    public function render()
    {
        return view('livewire.property-card');
    }
}
