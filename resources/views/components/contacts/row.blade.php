@props([
    'id' => 0,
    'full_name' => "Default Name",
    'email' => null,
    'phone_number' => null,
    'picture' => null,
    'birth_date' => "0001-01-01"
])
@php
    $src = !is_null($picture) ? Storage::url($picture) : "https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg";
@endphp
<div class="py-2 border-b border-zinc-400 mx-4 flex justify-between items-center">
    <img class="rounded-lg size-12" src="{{ $src }}" />
    <h2>{{ $full_name }}</h2>
    <div class="flex justify-between items-center">
        <flux:badge class="mr-4" color="green">{{ $birth_date }}</flux:badge>
        <flux:modal.trigger name="edit-contact" 
        @click="setFullContactDataAndWireLoadIt({{ $id }}, '{{ $full_name }}', '{{ $email }}', '{{ $phone_number }}', '{{ $picture }}', '{{ $birth_date }}')"
        >
            <flux:button variant="primary" class="cursor-pointer mr-4"><flux:icon.pencil class="size-5" />Edit Contact</flux:button>
        </flux:modal.trigger>
        <flux:modal.trigger name="delete-contact">
            <flux:button variant="danger" 
            @click="setDeleteContactIdAndFullName({{ $id }}, '{{ $full_name }}')" 
            class="cursor-pointer"><flux:icon.trash class="size-5" /></flux:button>
        </flux:modal.trigger>
    </div>
</div>