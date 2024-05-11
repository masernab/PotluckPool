<?php

namespace App\Livewire;

use App\Livewire\Traits\WizardTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class GeneralInfoStepComponent extends Component
{

    use WizardTrait;

    public function mount(): void
    {
        Cache::put('step-name', self::class);
    }

    public function render(): View
    {
        return view('livewire.general-info-step-component');
    }

}
