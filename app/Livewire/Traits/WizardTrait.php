<?php

namespace App\Livewire\Traits;

trait WizardTrait
{

    public array $allSteps;

    public string $stepName;

    public function nextStep(): void
    {
        $collection = collect($this->allSteps);
        $currentStepIndex = $collection->flip()->get($this->stepName);

        if (count($this->allSteps) > $currentStepIndex + 1) {

            $nextStep = $collection->get($currentStepIndex + 1);

            $this->dispatch('set-step', $nextStep);
        }
    }

    public function previousStep(): void
    {
        $collection = collect($this->allSteps);
        $currentStepIndex = collect($this->allSteps)->flip()->get($this->stepName);

        if ($currentStepIndex > 0) {

            $previousStep = $collection->get($currentStepIndex - 1);

            $this->dispatch('set-step', $previousStep);
        }
    }

}