<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Jobs\Mail\SendMailContact;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactHandle extends Component
{

    public $selectId;
    public $feedback;

    public function render()
    {
        return view('livewire.admin.contact.contact-handle');
    }

    protected $listeners = [
        'openHandleSendContact' => 'openHandleSendContactModal',
        'updateFeedback' => 'updateFeedback',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateFeedback($value)
    {
        $this->feedback = $value;
    }

    protected $rules = [
        'feedback' => 'required|string',
    ];

    protected $validationAttributes = [
        'feedback' => 'Phản hồi',
    ];

    public function openHandleSendContactModal($id)
    {
        $this->selectId = $id;
        $this->dispatchBrowserEvent('openHandleSendContactModal');
    }

    public function handleSendContact()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $contact = Contact::query()->find($this->selectId);
            $contact->feedback = $this->feedback;
            $contact->user_id = auth('admin')->id();
            $contact->status = Contact::STATUS['handle'];
            $contact->save();

            $this->feedback = "";


            SendMailContact::dispatch($contact->id);

            DB::commit();
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Gửi phản hồi thành công!']);
            $this->emit('refreshComponent');
            $this->dispatchBrowserEvent('closeModal');

        } catch (\Exception $exception) {
            Log::error('Error handle send contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            DB::rollBack();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Gửi thất bại!']);
        }


    }
}
