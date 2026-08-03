<?php

use Livewire\Component;
use Illuminate\Support\Carbon;

new class extends Component
{
    public $month = "";

    public function getMonthsOfYearForSelectSearch()
    {
        $months = [];
        $startMonth = Carbon::create(date('Y'));
        $months[1] = $startMonth->format('F');
        for ($i = 2; $i <= 12; $i++) {
            $months[$i] = $startMonth->addMonth()->format('F');
        }
        return $months;
    }

    public function searchCalendar()
    {
        dd($this->month);
    }
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
        <form wire:submit="searchCalendar">
            <div class="m-4 flex items-center">
                <flux:field>
                    <flux:label>Month</flux:label>
                    <x-utils.select-search :inputHiddenModel="'month'">
                    @foreach ($this->getMonthsOfYearForSelectSearch() as $monthNumber => $monthName)
                        <x-utils.select-search-element :key="$monthNumber" :value="$monthName" />
                    @endforeach
                    </x-utils.select-search>
                </flux:field>
                <flux:field class="ml-4">
                    <flux:label>Year</flux:label>
                    <flux:select placeholder="Choose a year...">
                        <flux:select.option>1000</flux:select.option>
                    </flux:select>
                </flux:field>
                <flux:field class="ml-4">
                    <span class="h-[17.5px]"></span>
                    <flux:button type="submit" variant="primary">{{ __('Search') }}</flux:button>
                </flux:field>
            </div>
        </form>
    </div>
</div>