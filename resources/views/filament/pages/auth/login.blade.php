<x-filament-panels::page.simple>
    <x-slot name="heading">
        Selamat Datang Admin
    </x-slot>

    <x-slot name="subheading">
        Silakan login ke dashboard
    </x-slot>

    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>
</x-filament-panels::page.simple>