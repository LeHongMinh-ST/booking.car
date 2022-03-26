<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $avatar;
    public $roleId;

    protected $listeners = [
        'changeRole' => 'updateRoleId',
        'changeImage' => 'updateThumbnail',
    ];

    public function render()
    {
        $roles = Role::query()->get();

        return view('livewire.admin.account.account-create', [
            'roles' => $roles
        ])->extends('admin.layouts.master')->section('content');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                'email',
                'unique:admins'
            ],
            'phone' => [
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if(!preg_match("/^[0-9]{10}$/", $value)) {
                        return $fail('Trường số điện thoại gồm 10 chữ số ');
                    }
                }
            ],
            'avatar' => 'nullable|image',
            'roleId' => 'required'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên tài khoản',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'avatar' => 'Ảnh đại diện',
        'roleId' => 'Vai trò',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateThumbnail($value)
    {
        $this->avatar = $value;
    }

    public function updateRoleId($value)
    {
        $this->roleId = $value;
        if ($value) {
            $this->resetValidation('roleId');
        }
    }

    public function store()
    {
        if (!checkPermission('account-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return;
        }

        $this->validate();

        try {

            $image = '';

            if ($this->avatar) {
                $image = $this->avatar;
            }

            Admin::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'avatar' => $image,
                'password' => Hash::make(env('PASSWORD_ADMIN', 123456789)),
                'role_id' => $this->roleId,
            ]);


            session()->flash('success', 'Tạo mới thành công');

            return redirect()->route('admin.account');
        }catch (\Exception $e) {
            Log::error('Error create account', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }

    public function clearImagePreview()
    {
        $this->avatar = '';
    }
}
