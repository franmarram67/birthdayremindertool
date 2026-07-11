<?php

use App\Livewire\Forms\CreateEditContactForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Contact;

new class extends Component {
    use WithFileUploads;

    public CreateEditContactForm $create_edit_contact_form;

    public int $contact_id = 0;

    public function createContact()
    {
        $createContactForm = $this->create_contact_form;
        $createContactForm->validate();

        $picturePath = null;
        if (!is_null($createContactForm->picture)) {
            $picturePath = $createContactForm->picture->store(path: "contact-pictures", options: "public");
        }

        Contact::create([
            'full_name' => $createContactForm->full_name,
            'email' => $createContactForm->email,
            'phone_number' => $createContactForm->phone_number,
            'picture' => $picturePath,
            'birth_date' => $createContactForm->birth_date,
            'user_id' => Auth::user()->id,
        ]);

        $this->redirect('contacts');
    }

    public function deleteContact()
    {
        try {
            $this->validate([
                'contact_id' => 'integer|gt:0'
            ]);
        } catch (\Exception $e) {
            $this->addError('contact_id', $e->getMessage());
            return;
        }

        $contact = Contact::whereBelongsTo(Auth::user())->find($this->contact_id);

        $contact->delete();

        $this->redirect('contacts');
    }

    public function loadContactData($id)
    {
        $contact = Contact::whereBelongsTo(Auth::user())->find($id);

        $this->create_edit_contact_form->full_name = $contact->full_name;
        $this->create_edit_contact_form->email = $contact->email;
        $this->create_edit_contact_form->phone_number = $contact->phone_number;
        $this->create_edit_contact_form->picture = $contact->picture;
        $this->create_edit_contact_form->birth_date = $contact->birth_date;
        // dd($contact);
        // dd($this->create_edit_contact_form);
        // return [
        //     'full_name' => $contact->full_name,
        //     'email' => $contact->email,
        //     'phone_number' => $contact->phone_number,
        //     'picture' => $contact->picture,
        //     'birth_date' => $contact->birth_date,
        // ];
    }
};
?>

<div class="border dark:border-zinc-400 w-full h-full rounded-lg dark:bg-zinc-700" x-data="contact">
    <flux:modal name="create-contact" variant="contact">
        <form wire:submit="createContact">
            <flux:heading size="lg" class="mb-2">{{ __('Create a Contact') }}</flux:heading>
            <flux:separator />
            <flux:field class="mt-2">
                <flux:label>{{ __('Full name') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.full_name" type="text" />
                <flux:error name="full_name" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Email') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.email" type="email" />
                <flux:error name="email" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Phone number') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.phone_number" type="text" />
                <flux:error name="phone_number" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Picture') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.picture" type="file" />
                <flux:description>JPG or PNG max 10MB with aspect ratio 1:1</flux:description>
                <flux:error name="picture" />
            </flux:field>
            <flux:field class="my-2">
                <flux:label>{{ __('Birth date') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.birth_date" type="date" />
                <flux:error name="birth_date" />
            </flux:field>
            <flux:separator />
            <flux:button class="mt-2 cursor-pointer" type="submit" variant="primary">{{ __('Create') }}</flux:button>
        </form>
    </flux:modal>
    <flux:modal name="delete-contact" variant="contact">
        <form wire:submit="deleteContact">
            <flux:heading size="lg" class="mb-2">{{ __('Delete a Contact') }}</flux:heading>
            <flux:separator />
            <flux:text class="my-2">Are you sure you want to delete your "<span x-text="full_name"></span>" contact?</flux:text>
            <flux:input type="hidden" x-bind:value="id" wire:model="contact_id" x-effect="$wire.contact_id = id" /> {{-- without x-effect this doesn't work. please treat this as super fragile --}}
            <flux:error name="contact_id"></flux:error>
            <flux:separator />
            <div class="mt-2">
                <flux:button class="cursor-pointer mr-2" type="button" variant="primary" @click="$flux.modals('delete-contact').close()">{{ __('Cancel') }}</flux:button>
                <flux:button class="cursor-pointer" type="submit" variant="danger">{{ __('Delete') }}</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="edit-contact" variant="contact">
        <form wire:submit="editContact">
            <flux:heading size="lg" class="mb-2">{{ __('Edit a Contact') }}</flux:heading>
            <flux:separator />
            <flux:field class="mt-2">
                <flux:label>{{ __('Full name') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.full_name" type="text" x-bind:value="full_name" />
                <flux:error name="full_name" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Email') }}</flux:label>
                <flux:input wire:model="create_edit_contact_form.email" type="email" x-bind:value="email" />
                <flux:error name="email" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Phone number') }}</flux:label>
                <flux:input wire:model="create_contact_form.phone_number" type="text" x-bind:value="phone_number" />
                <flux:error name="phone_number" />
            </flux:field>
            <flux:field class="mt-2">
                <flux:label>{{ __('Picture') }}</flux:label>
                <flux:input wire:model="create_contact_form.picture" type="file" />
                <flux:description>JPG or PNG max 10MB with aspect ratio 1:1</flux:description>
                <flux:error name="picture" />
            </flux:field>
            <flux:field class="my-2">
                <flux:label>{{ __('Birth date') }}</flux:label>
                <flux:input wire:model="create_contact_form.birth_date" type="date" x-bind:value="birth_date" />
                <flux:error name="birth_date" />
            </flux:field>
            <flux:separator />
            <flux:button class="mt-2 cursor-pointer" type="submit" variant="primary">{{ __('Create') }}</flux:button>
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
        @foreach (Auth::user()->contacts as $contact)
        @php
            $src = !is_null($contact->picture) ? Storage::url($contact->picture) : "https://static.vecteezy.com/system/resources/thumbnails/009/734/564/small/default-avatar-profile-icon-of-social-media-user-vector.jpg";
        @endphp
            <x-contacts.row
                :id="$contact->id"
                :src="$src"
                :fullName="$contact->full_name"
                :birthDate="$contact->birth_date"
            />
        @endforeach
    </div>
</div>