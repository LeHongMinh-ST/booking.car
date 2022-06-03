<?php

namespace App\Http\Livewire\Client;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $content;

    public function render()
    {
        return view('livewire.client.contact')
            ->extends('client.layouts.master')->section('content');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',

        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên loại xe',
        'phone' => 'Số điện thoại',
        'subject' => 'Chủ đề',
        'content' => 'Nội dung',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendContact()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            $contact = new \App\Models\Contact();
            $contact->name = $this->name;
            $contact->email = $this->email;
            $contact->phone = $this->phone;
            $contact->subject = $this->subject;
            $contact->content = $this->content;
            $contact->status = \App\Models\Contact::STATUS['no_process'];
            $contact->save();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Gửi liên hệ thành công, chúng tôi sẽ phản hồi lại sớm nhất', 'title' => 'Thành công',]);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Error send feedback', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Gửi thất bại', 'title' => 'Lỗi',]);
        }
    }


}
