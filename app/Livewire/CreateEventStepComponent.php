<?php

namespace App\Livewire;

use App\Livewire\Traits\WizardTrait;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateEventStepComponent extends Component
{
    use WizardTrait;

    #[Validate('required|min:3|unique:events,name', onUpdate: false)]
    public ?string $eventName = null;

    #[Validate('nullable', onUpdate: false)]
    public ?string $description = null;

    #[Validate('required|date', onUpdate: false)]
    public ?string $date = null;

    #[Validate('required', onUpdate: false)]
    public ?string $location = null;

    #[Validate('required', onUpdate: false)]
    public ?string $name = null;

    #[Validate('required|email', onUpdate: false)]
    public ?string $email = null;

    #[Validate('required', onUpdate: false)]
    public ?string $phone = null;

    public function mount(): void
    {
        $event = Cache::get('event-id') ?: null;

        $this->eventName = $event?->name;
        $this->description = $event?->description;
        $this->date = $event?->date;
        $this->location = $event?->location;

        $owner = $event?->arragner();

        $this->name = $owner?->name;
        $this->email = $owner?->email;
        $this->phone = $owner?->phone;
    }

    public function render(): View
    {
        return view('livewire.create-event-step-component');
    }

    public function saveAndNext(): void
    {
        $validatedData = $this->validate();

        /** @var Event $event */
        $event = Event::create($validatedData);

        $event->members()->create([
            'is_owner' => 1,
            ...$validatedData,
        ]);

        Cache::put('event-id', $event);

        $this->nextStep();
    }
}
