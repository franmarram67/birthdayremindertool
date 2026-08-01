@props([
    'key' => 0,
    'value' => ""
])
<div class="text-zinc-300 text-sm p-[0.56rem] hover:bg-zinc-500 search-element" data-number="{{ $key }}"
    @click.stop="selectElement($el)">
    {{ $value }}
</div>