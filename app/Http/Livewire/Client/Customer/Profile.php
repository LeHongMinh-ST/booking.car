<?php

namespace App\Http\Livewire\Client\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $phone;
    public $email;
    public $person_id;
    public $address;
    public $permanentResidence;
    public $thumbnail;
    public $selectId;
    public $isActive;
    public $userID;
    public $imageUpdate;

    protected $listeners = [
        'changeImage' => 'updateThumbnail',
        'closeModelReset' => 'closeModal',
    ];

    public function render()
    {
        return view('livewire.client.customer.profile')->extends('client.customer.layouts.master')->section('content');;
    }

    public function mount()
    {
        $user = auth('web')->user();

        $customer = Customer::query()->where('user_id', $user->id)->first();
        if ($customer) {
            $this->name = $customer->name;
            $this->phone = $customer->phone;
            $this->email =  $customer->user ? $customer->user->email : '';
            $this->isActive = $customer->user ? $customer->user->is_active : '';;
            $this->address = $customer->address;
            $this->person_id = $customer->person_id;
            $this->permanentResidence = $customer->permanent_residence;
            $this->selectId = $customer->id;
            $this->userID = $customer->user ? $customer->user->id : '';
            $this->thumbnail = $user->thumbnail;
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'max:255',
                'email',
                'unique:users,email,'.$this->userID,
            ],
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!preg_match("/^[0-9]{10}$/", $value)) {
                        return $fail('Trường số điện thoại gồm 10 chữ số');
                    }
                }
            ],
            'person_id' => 'required|string|max:255|unique:customers,person_id,' . $this->selectId,
            'permanentResidence' => 'required|string|max:255',
            'address' => 'required|string'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Họ và tên',
        'phone' => 'Số điện thoại',
        'personID' => 'CCCD/CMT',
        'address' => 'Địa chỉ',
        'permanentResidence' => 'Hộ khẩu thường chú',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            $image = $this->imageUpdate;

            if ($this->thumbnail) {
                $image = $this->thumbnail;
            }

            $customer = Customer::query()->where('user_id', auth('web')->id())->first();

            $customer->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'person_id' => $this->person_id,
                'address' => $this->address,
                'permanent_residence' => $this->permanentResidence,
            ]);

            $customer->user()->update([
                'name' => $this->name,
                'email' => $this->email,
                'thumbnail' => $image
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error update profile', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
    public function updateThumbnail($value)
    {
        $this->thumbnail = $value;
    }

    public function clearImagePreview()
    {
        $this->thumbnail = '';
    }

    public function openResetModal()
    {
        $this->dispatchBrowserEvent('openResetModal');
    }
    public function closeModal()
    {
//        $this->resetForm();
        $this->dispatchBrowserEvent('closeModal');
    }

}
