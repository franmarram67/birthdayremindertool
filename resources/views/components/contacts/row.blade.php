@props([
    'src' => "https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg",
    'fullName' => "Default Name",
    'birthDate' => "0001-01-01"
])

<div class="py-2 border-b border-zinc-400 mx-4 flex justify-between items-center">
    <img class="rounded-lg size-12" src="{{ $src }}" />
    <h2>{{ $fullName }}</h2>
    <div class="flex justify-between items-center">
        <flux:badge class="mr-4" color="green">{{ $birthDate }}</flux:badge>
        <flux:button variant="primary" class="cursor-pointer" ><flux:icon.pencil class="size-4" />Edit Contact</flux:button>
    </div>
</div>