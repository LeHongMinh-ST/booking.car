<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerUpdate extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $email;
    public $person_id;
    public $address;
    public $permanentResidence;
    public $personIDAddress;
    public $personIDDate;
    public $thumbnail;
    public $imageUpdate;
    public $selectId;
    public $isActive;
    public $userID;

    public function render()
    {
        return view('livewire.admin.customer.customer-update')
            ->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $customer = Customer::query()->find($id);
        if ($customer) {
            $this->name = $customer->name;
            $this->phone = $customer->phone;
            $this->imageUpdate = $customer->user ? $customer->user->thumbnail : '';
            $this->email =  $customer->user ? $customer->user->email : '';
            $this->isActive = $customer->user ? $customer->user->is_active : '';;
            $this->address = $customer->address;
            $this->person_id = $customer->person_id;
            $this->personIDDate = $customer->person_id_date;
            $this->personIDAddress = $customer->person_id_address;
            $this->permanentResidence = $customer->permanent_residence;
            $this->selectId = $customer->id;
            $this->userID = $customer->user ? $customer->user->id : '';
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
            'address' => 'required|string',
            'personIDAddress' => 'required|string',
            'personIDDate' => 'required|string|date|date_format:d-m-Y',
            'thumbnail' => 'nullable|image',
        ];
    }

    protected $validationAttributes = [
        'name' => 'Họ và tên',
        'phone' => 'Số điện thoại',
        'personID' => 'CCCD/CMT',
        'address' => 'Địa chỉ',
        'permanentResidence' => 'Hộ khẩu thường chú',
        'personIDAddress' => 'Nơi cấp',
        'personIDDate' => 'Ngày cấp',
        'thumbnail' => 'Ảnh đại diện',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        if (!checkPermission('customer-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate();

        DB::beginTransaction();

        try {

            $image = $this->imageUpdate;

            if ($this->thumbnail) {
                $image = '/storage/' . $this->thumbnail->store('customer', 'public');
            }

            $customer = Customer::query()->where('id', $this->selectId)->first();

            $customer->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'person_id' => $this->person_id,
                'address' => $this->address,
                'permanent_residence' => $this->permanentResidence,
                'person_id_address' => $this->personIDAddress,
                'person_id_date' => $this->personIDDate,
            ]);

            $customer->user()->update([
                'name' => $this->name,
                'email' => $this->email,
                'thumbnail' => $image,
                'password' => Hash::make(env('PASSWORD_USER', 123456789)),
            ]);

            session()->flash('success', 'Cập nhật thành công');

            DB::commit();
            return redirect()->route('admin.customer');
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error update customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }
}
