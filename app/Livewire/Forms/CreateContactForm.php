<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateContactForm extends Form
{
    #[Validate('required|string')]
    public $full_name;

    #[Validate('nullable|email')]
    public $email;

    #[Validate('nullable|string')]
    public $phone_number;

    #[Validate('nullable|image|dimensions:ratio=1|max:10240')]
    public $picture;

    #[Validate('required|date|filled')]
    public $birth_date;
}
