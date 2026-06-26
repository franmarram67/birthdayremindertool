<?php

use Livewire\Component;

new class extends Component
{
    public $defaultContactImageSrc = "https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg"; 
};
?>

<div class="border dark:border-zinc-400 w-full h-full rounded-lg dark:bg-zinc-700">
    <flux:modal name="create-contact">
        <flux:heading size="lg">{{ __('Create a Contact') }}</flux:heading>
    </flux:modal>
    <div class="flex justify-between items-center">
        <div class="m-4">
            <flux:heading size="xl">{{ __('Contacts') }}</flux:heading>
            <flux:subheading>{{ __('Add or manage contacts') }}</flux:subheading>
        </div>
        <flux:modal.trigger name="create-contact">
            <flux:button class="mr-4 cursor-pointer" variant="primary">
                <flux:icon.plus/>{{ __('Create Contact') }}
            </flux:button>
        </flux:modal.trigger>
    </div>
    <div class="border-b border-zinc-400 mx-4"></div>
    <div>
        <x-contacts.row :src="$defaultContactImageSrc"/>
        <x-contacts.row/>
        <x-contacts.row/>
        <x-contacts.row/>
    </div>
</div>