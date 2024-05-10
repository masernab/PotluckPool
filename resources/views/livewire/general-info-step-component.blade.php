<div class="text-center">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Don't worry about who owes you</h1>
    <p class="mt-6 text-lg leading-8 text-gray-600">Create an event and you will know how much each member will pay you.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
        <button wire:click="nextStep" wire:loading.attr="disabled" type="button" class="flex rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Get started
            <svg wire:loading.flex class="ml-1 mr-1 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="#636363"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </button>
        <button class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></button>
    </div>
</div>
