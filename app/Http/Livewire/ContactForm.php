<?php

namespace App\Http\Livewire;

use App\Http\Requests\CreateContactRequest;
use Livewire\Component;
use App\Models\Contact;
class ContactForm extends Component
    {public $Name ;
    public $Number ;
    public $Subject ;
    public $Email ;
    public $Message ;
    public $Success_Message;

    protected $rules = [
        'Name' => 'required|min:3',
        'Number' => 'required|numeric',
        'Email' => 'required|email',
        'Subject' => 'required|min:3',
        'Message' => 'required|min:10',
    ];
    public function updated($propertyName)
    {   $this->validateOnly($propertyName);

    }
    public function submit_form()
    { $validated = $this->validate();
         Contact::create([
            'Name'=> $validated['Name'],
            'Number'=>$validated['Number'],
            'Subject'=>$validated['Email'],
            'Email'=>$validated['Subject'],
            'Message'=>$validated['Message'],
        ]);
        session()->flash('ContactSend','your contact sent succesfully to admins');
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
