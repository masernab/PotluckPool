<?php

namespace App\Livewire;

use App\Livewire\Traits\WizardTrait;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateEventStepComponent extends Component
{
    use WizardTrait;

    public function render(): View
    {
        return view('livewire.create-event-step-component');
    }
}
