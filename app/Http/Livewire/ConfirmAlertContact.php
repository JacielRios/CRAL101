<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ConfirmAlertContact extends Component
{
    public $contactId;

    public function render()
    {
        return view('livewire.confirm-alert-contact');
    }

    public function destroy($contactId)
    {
        $contact = Contact::find($contactId);
        $contact->delete();
        return redirect()->route('contacts.index');
    }  
}
