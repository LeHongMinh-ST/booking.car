<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status = "";
    public $perPage = 10;
    public $search = '';
    public $selectId;
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $content;
    public $statusContact;
    public $statusContactText;
    public $feedback;
    public $user;
    protected $listeners = ['refreshComponent' => '$refresh'];


    public function render()
    {
        $contacts = Contact::query()
            ->search($this->search)
            ->status($this->status)->paginate($this->perPage);

        return view('livewire.admin.contact.contact-index', [
            'contacts' => $contacts
        ])->extends('admin.layouts.master')->section('content');;
    }

    public function openDetail($id)
    {
        $this->selectId = $id;
        $contact = Contact::query()->find($id);
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->subject = $contact->subject;
        $this->content = $contact->content;
        $this->statusContact = $contact->status;
        $this->feedback = $contact->feedback;
        $this->user = $contact->admin->name ?? "";
        $this->statusContactText = $contact->statusText;
        $this->dispatchBrowserEvent('openDetailModal');
    }

    public function openHandleSendContact($id)
    {
        $this->closeModal();
        $this->emit('openHandleSendContact', $id);
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

}
