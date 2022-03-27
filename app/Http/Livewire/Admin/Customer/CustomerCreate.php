<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class CustomerCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $email;
    public $person_id;
    public $address;
    public $permanentResidence;
    public $thumbnail;

    public function render()
    {
        return view('livewire.admin.customer.customer-create')
            ->extends('admin.layouts.master')->section('content');
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
                'unique:users'
            ],
            'phone' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if(!preg_match("/^[0-9]{10}$/", $value)) {
                        return $fail('Trường số điện thoại gồm 10 chữ số');
                    }
                }
            ],
            'person_id' => 'required|string|max:255|unique:customers',
            'permanentResidence' => 'required|string',
            'address' => 'required|string',
            'thumbnail' => 'nullable|image',
        ];
    }

    protected $validationAttributes  = [
        'name' => 'Họ và tên',
        'phone' => 'Số điện thoại',
        'person_id' => 'CCCD/CMT',
        'address' => 'Địa chỉ',
        'permanentResidence' => 'Hộ khẩu thường chú',
        'thumbnail' => 'Ảnh đại diện',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        if (!checkPermission('customer-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        $this->validate();

        DB::beginTransaction();

        try {

            $image = '';

            if ($this->thumbnail) {
                $image = '/storage/'. $this->thumbnail->store('customer', 'public');
            }

            $user = null;

            if ($this->email) {
                $user = User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'thumbnail' => $image,
                    'password' => Hash::make(env('PASSWORD_USER', 123456789)),
                ]);
            }

            Customer::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'person_id' => $this->person_id,
                'address' => $this->address,
                'permanent_residence' => $this->permanentResidence,
                'user_id' => $user ? $user->id : null,
            ]);

            session()->flash('success', 'Tạo mới thành công');

            DB::commit();
            return redirect()->route('admin.customer');
        }catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error create customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }
}
