<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div class="border dark:border-zinc-400 w-full h-full rounded-lg dark:bg-zinc-700">
    <div class="flex justify-between items-center">
        <div class="m-4">
            <flux:heading size="xl">{{ __('Calendar') }}</flux:heading>
            <flux:subheading>{{ __('Manage your contacts\' birthdays') }}</flux:subheading>
        </div>
    </div>
    <div class="border-b border-zinc-400 mx-4"></div>
    <div class="flex justify-between items-center">
        <div class="m-4 flex items-center">
            <flux:field>
                <flux:label>Month</flux:label>
                <flux:select placeholder="Choose a month..."></flux:select>
            </flux:field>
            <flux:field class="ml-4">
                <flux:label>Year</flux:label>
                <flux:select placeholder="Choose a year..."></flux:select>
            </flux:field>
        </div>
    </div>
</div>