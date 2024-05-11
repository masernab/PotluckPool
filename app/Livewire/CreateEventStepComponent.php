<?php

namespace App\Livewire;

use App\Livewire\Traits\WizardTrait;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateEventStepComponent extends Component
{
    use WizardTrait;

    //    #[Validate('required|min:3|unique:events,name', onUpdate: false)]
    public ?string $eventName = null;

    //    #[Validate('nullable', onUpdate: false)]
    public ?string $description = null;

    //    #[Validate('required|date', onUpdate: false)]
    public ?string $date = null;

    //    #[Validate('required', onUpdate: false)]
    public ?string $location = null;

    //    #[Validate('required', onUpdate: false)]
    public ?string $name = null;

    //    #[Validate('required|email', onUpdate: false)]
    public ?string $email = null;

    //    #[Validate('required', onUpdate: false)]
    public ?string $phone = null;

    public ?Event $event = null;

    public function rules(): array
    {
        return [
            'eventName'   => ['required', 'min:3', Rule::unique('events', 'name')->ignore($this->event?->id)],
            'description' => ['nullable'],
            'date'        => ['required', 'date'],
            'location'    => ['required'],
            'name'        => ['required'],
            'email'       => ['required', 'email'],
            'phone'       => ['required'],
        ];
    }

    public function mount(): void
    {
        $this->event = Cache::get('event-id') ?: null;

        $this->eventName = $this->event?->name;
        $this->description = $this->event?->description;
        $this->date = $this->event?->date;
        $this->location = $this->event?->location;

        $owner = $this->event?->arragner();

        $this->name = $owner?->name;
        $this->email = $owner?->email;
        $this->phone = $owner?->phone;

        Cache::put('step-name', self::class);
    }

    public function render(): View
    {
        return view('livewire.create-event-step-component');
    }

    public function saveAndNext(): void
    {
        $this->validate();

        /** @var Event $event */
        $event = Event::updateOrCreate(
            ['id' => $this->event?->id],
            [
                'name'        => $this->eventName,
                'description' => $this->description,
                'date'        => $this->date,
                'location'    => $this->location,
            ]
        );

        $event->members()->updateOrCreate(
            ['is_owner' => 1],
            [
                'name'  => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]
        );

        Cache::put('event-id', $event);

        //        $this->nextStep();

        //        Cache::put('step-name', GeneralInfoStepComponent::class);
        $this->goToStep(GeneralInfoStepComponent::class);
    }
}
