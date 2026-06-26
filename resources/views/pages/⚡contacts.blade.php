<?php

use Livewire\Component;

new class extends Component
{
    public $defaultContactImageSrc = "https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg";

    public $full_name = "";
    public $email = "";
    public $phone_number = "";
    public $picture;
    public $birth_date = "";

    public function createContact()
    {

    }
};
?>

<div class="border dark:border-zinc-400 w-full h-full rounded-lg dark:bg-zinc-700">
    <flux:modal name="create-contact" variant="create-contact">
        <form wire:submit="createContact">
            <flux:heading size="lg" class="mb-2">{{ __('Create a Contact') }}</flux:heading>
            <flux:separator />
            <flux:field class="mt-2">
                <flux:label>{{ __('Full name') }}</flux:label>
                <flux:input wire:model="full_name" type="text" />
                <flux:error name="full_name" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Email') }}</flux:label>
                <flux:input wire:model="email" type="email" />
                <flux:error name="email" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Phone number') }}</flux:label>
                <flux:input wire:model="phone_number" type="text" />
                <flux:error name="phone_number" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Picture') }}</flux:label>
                <flux:input wire:model="picture" type="file" />
                <flux:description>JPG or PNG max 10MB with aspect ratio 1:1</flux:description>
                <flux:error name="picture" />
            </flux:field>
            <flux:field class="my-2">
                <flux:label>{{ __('Birth date') }}</flux:label>
                <flux:input wire:model="birth_date" type="date" />
                <flux:error name="birth_date" />
            </flux:field>
            <flux:separator />
            <flux:button class="mt-2" type="submit" class="cursor-pointer" variant="primary">{{ __('Create') }}</flux:button>
        </form>
    </flux:modal>
    <div class="flex justify-between items-center">
        <div class="m-4">
            <flux:heading size="xl">{{ __('Contacts') }}</flux:heading>
            <flux:subheading>{{ __('Add or manage contacts') }}</flux:subheading>
        </div>
        <flux:modal.trigger name="create-contact">
            <flux:button class="mr-4 cursor-pointer" variant="primary">
                <flux:icon.plus />{{ __('Create Contact') }}
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