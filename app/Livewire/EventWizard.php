<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class EventWizard extends Component
{
    public string $stepName;

    public array $allSteps = [];

    public function mount(string $stepName = null): void
    {
        $this->stepName = $stepName ?: $this->steps()[0];
        $this->allSteps = $this->steps();
    }

    public function render(): View
    {
        return view('livewire.event-wizard');
    }

    public function steps(): array
    {
        return [
            GeneralInfoStepComponent::class,
            CreateEventStepComponent::class,
        ];
    }

    #[On('set-step')]
    public function setStep(string $stepName): void
    {
        $this->stepName = $stepName;
    }
}
