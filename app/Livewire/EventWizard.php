<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class EventWizard extends Component
{
    public string $stepName;

    public array $allSteps = [];

    public function mount(string $stepName = null): void
    {
        $this->allSteps = $this->steps();

        if ($stepName) {
            $this->stepName = $stepName;
        } elseif(Cache::has('step-name')) {
            $this->stepName = Cache::get('step-name');
        } else {
            $this->stepName = $this->steps()[0];
        }
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
