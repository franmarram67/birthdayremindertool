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
                {{-- <flux:select placeholder="Choose a month..."></flux:select> --}}
                {{-- <select class="appearance-none [:where(&)]:w-full ps-3 pe-10 block h-10 py-2 text-base sm:text-sm leading-[1.375rem] rounded-lg shadow-xs border bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 dark:text-zinc-300 disabled:text-zinc-500 dark:disabled:text-zinc-400 has-[option.placeholder:checked]:text-zinc-400 dark:has-[option.placeholder:checked]:text-zinc-400 dark:[&>option]:bg-zinc-700 dark:[&>option]:text-white disabled:shadow-none border border-zinc-200 border-b-zinc-300/80 dark:border-white/10">
                    <option>WTF</option>
                </select> --}}
                <div class="border dark:border-zinc-400 rounded-lg dark:bg-zinc-600 p-2">
                    <input type="text" placeholder="Choose a month..." class="focus:outline-0 text-zinc-300 text-sm" />
                </div>
            </flux:field>
            <flux:field class="ml-4">
                <flux:label>Year</flux:label>
                <flux:select placeholder="Choose a year..."></flux:select>
            </flux:field>
        </div>
    </div>
</div>