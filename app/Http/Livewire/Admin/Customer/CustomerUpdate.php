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
    public $thumbnail;
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
            $this->email =  $customer->user ? $customer->user->email : '';
            $this->isActive = $customer->user ? $customer->user->is_active : '';;
            $this->address = $customer->address;
            $this->person_id = $customer->person_id;
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
        if (!checkPermission('customer-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        $this->validate();

        DB::beginTransaction();

        try {

            $customer = Customer::query()->where('id', $this->selectId)->first();

            $customer->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'person_id' => $this->person_id,
                'address' => $this->address,
                'permanent_residence' => $this->permanentResidence,
            ]);

            if ($customer->user_id) {
                $customer->user()->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'is_active' => $this->isActive,
                ]);
            } else {
                if ($this->email) {
                    $user = User::query()->create([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => Hash::make(env('PASSWORD_USER', 123456789)),
                    ]);
                    $customer->user_id = $user->id;
                    $customer->save();
                }
            }
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
