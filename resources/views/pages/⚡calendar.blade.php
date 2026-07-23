<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>
<style>
    .rojo {
        background-image: url("data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22none%22%20viewBox%3D%220%200%2024%2024%22%20stroke-width%3D%221.5%22%20stroke%3D%22currentColor%22%20class%3D%22size-6%22%3E%0A%20%20%3Cpath%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20d%3D%22M8.25%2015%2012%2018.75%2015.75%2015m-7.5-6L12%205.25%2015.75%209%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
        background-color:
    }
</style>
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
                <div class="border dark:border-zinc-400 rounded-lg dark:bg-zinc-600 p-6 rojo">
                    <input type="text" placeholder="Choose a month..." class="p-2 focus:outline-0 text-zinc-300 text-sm"  />
                    
                </div>
            </flux:field>
            <flux:field class="ml-4">
                <flux:label>Year</flux:label>
                <flux:select placeholder="Choose a year..."></flux:select>
            </flux:field>
        </div>
    </div>
</div>