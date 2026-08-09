@props([
    'key' => 0,
    'value' => "",
    'isSelected' => false,
])
<div class="text-zinc-300 text-sm p-[0.56rem] hover:bg-zinc-500 search-element" 
    data-number="{{ $key }}"
    @click.stop="selectElement($el)" 
    x-init="{{ $isSelected }} ? selectElement($el) : null" >
    {{ $value }}
</div>