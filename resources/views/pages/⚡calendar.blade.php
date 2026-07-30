<?php

use Livewire\Component;
use Illuminate\Support\Carbon;

new class extends Component
{
    public function getMonthsOfYearForSelectSearch()
    {
        $startMonth = Carbon::create(date('Y'))->format('F');
        dd($startMonth);
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
        <div class="m-4 flex items-center">
            <flux:field>
                <flux:label>Month</flux:label>
                <div 
                    class="flex justify-center items-center [&:hover>svg]:stroke-zinc-300  relative" 
                    x-data="{ 
                        focusSearchSelect: false,
                        searchSelectBase(searchElement) {
                            let value = searchElement.value;
                            let selectSearch = searchElement.parentNode.querySelector('[select-search]');
                            let allSearchElements = selectSearch.querySelectorAll('.search-element');
                            let numberOfSearchElements = allSearchElements.length;
                            let numberOfHiddenSearchElements = 0;
                            allSearchElements.forEach((element) => {
                                let elementText = element.innerText.toLowerCase();
                                if (!elementText.includes(value.toLowerCase())) {
                                    element.classList.add('hidden');
                                    numberOfHiddenSearchElements++;
                                } else {
                                    element.classList.remove('hidden');
                                }
                            });
                            let defaultSearch = selectSearch.querySelector('.default-search-element');
                            if (numberOfHiddenSearchElements >= numberOfSearchElements) {
                                defaultSearch.classList.remove('hidden');
                            } else {
                                defaultSearch.classList.add('hidden');
                            }
                        },
                        searchSelect(searchElement) {
                            this.searchSelectBase(searchElement);
                            let inputHidden = searchElement.parentNode.querySelector(`input[type='hidden']`);
                            inputHidden.value = '';
                        },
                        selectElement(element) {
                            let number = element.getAttribute('data-number');
                            let text = element.innerText;
                            let inputsParent = element.parentNode.parentNode;
                            let inputText = inputsParent.querySelector(`input[type='text']`);
                            let inputHidden = inputsParent.querySelector(`input[type='hidden']`);
                            inputText.value = text;
                            inputHidden.value = number;
                            this.searchSelectBase(inputText);
                            this.focusSearchSelect = false;
                        }
                    }" 
                    @click.outside="focusSearchSelect = false" 
                    @click="focusSearchSelect = true"
                >
                    <input 
                        type="hidden"
                        value=""
                        name="search-number"
                    />
                    <input 
                        type="text" 
                        placeholder="Choose a month..." 
                        class="p-[0.56rem] focus:outline-0 text-zinc-300 text-sm w-40 border dark:border-zinc-400 rounded-lg dark:bg-zinc-600 dark:hover:border-zinc-300"
                        :class="focusSearchSelect ? 'border-b-0 rounded-b-none dark:border-zinc-300!' : ''"
                        @input="searchSelect($el)" 
                        name="search-text"
                    />
                    <svg 
                        width='24' 
                        height='24' 
                        viewBox='0 0 24 24' 
                        fill='none' 
                        xmlns='http://www.w3.org/2000/svg' 
                        class="flex justify-center items-center absolute z-10 right-1.5 dark:stroke-zinc-400"
                        :class="focusSearchSelect ? 'dark:stroke-zinc-300!' : ''" 
                    >
                        <path d='M8 9L12 5L16 9' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/>
                        <path d='M16 15L12 19L8 15' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/>
                    </svg>
                    <span 
                        class="absolute border-t border-t-zinc-500 w-39.5 h-0 top-9.5 left-px z-10"
                        :class="focusSearchSelect ? '' : 'hidden'"
                    ></span>
                    @php
                        $this->getMonthsOfYearForSelectSearch();
                    @endphp
                    <div 
                        class="absolute border dark:border-zinc-300 rounded-lg dark:bg-zinc-600 w-40 max-h-38 mt-0 top-9.5 left-0 border-t-0 rounded-t-none overflow-scroll" 
                        :class="focusSearchSelect ? '' : 'hidden'"
                        select-search
                        x-data="{ 
                            monthsOfYear: {
                                1: 'January',
                                2: 'February',
                                3: 'March',
                                4: 'April',
                                5: 'May',
                                6: 'June',
                                7: 'July',
                                8: 'August',
                                9: 'September',
                                10: 'October',
                                11: 'November',
                                12: 'December',
                            }
                        }"
                    >
                        <div class="text-zinc-400 text-sm p-[0.56rem] hidden default-search-element">No results found.</div>
                        <template x-for="(value, index) in monthsOfYear">
                            <div 
                                class="text-zinc-300 text-sm p-[0.56rem] hover:bg-zinc-500 search-element" 
                                :data-number="index" 
                                x-text="value"
                                @click.stop="selectElement($el)"
                            >
                            </div>
                        </template>
                    </div>
                </div>
            </flux:field>
            <flux:field class="ml-4">
                <flux:label>Year</flux:label>
                <flux:select placeholder="Choose a year...">
                    <flux:select.option>1000</flux:select.option>
                </flux:select>
            </flux:field>
        </div>
    </div>
</div>