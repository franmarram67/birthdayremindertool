<?php

use Livewire\Component;
use Illuminate\Support\Carbon;

new class extends Component
{
    public int $month;
    public int $year;

    public function mount()
    {
        $requestedYear = (int) request()->year ?? null;
        $this->year = is_null($requestedYear) ? date('Y') : $requestedYear;
        $this->month = date('m');
    }

    public function getMonthsOfYearForSelectSearch()
    {
        $requestedMonth = (int) request()->month ?? null;
        $months = [];
        $startMonth = Carbon::create(date('Y'));
        for ($i = 1; $i <= 12; $i++) {
            $monthName = $i === 1 ? $startMonth->format('F') : $startMonth->addMonth()->format('F');
            $months[$i] = [
                'monthName' => $monthName, 
                'isSelected' => is_null($requestedMonth) ? $this->month === $i : $requestedMonth === $i,
            ];
        }
        return $months;
    }

    public function searchCalendar()
    {
        $redirectUrl = "calendar?month={$this->month}&year={$this->year}";
        $this->redirect($redirectUrl, navigate: true);
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
                    @foreach ($this->getMonthsOfYearForSelectSearch() as $monthNumber => $monthData)
                        <x-utils.select-search-element :key="$monthNumber" :value="$monthData['monthName']" :isSelected="$monthData['isSelected']" />
                    @endforeach
                    </x-utils.select-search>
                </flux:field>
                <flux:field class="ml-4">
                    <flux:label>Year</flux:label>
                    <flux:input type="number" min="1980" placeholder="Choose a year..." wire:model="year" class="w-40!" />
                </flux:field>
                <flux:field class="ml-4">
                    <span class="h-[17.5px]"></span>
                    <flux:button type="submit" variant="primary">{{ __('Search') }}</flux:button>
                </flux:field>
            </div>
        </form>
    </div>
</div>