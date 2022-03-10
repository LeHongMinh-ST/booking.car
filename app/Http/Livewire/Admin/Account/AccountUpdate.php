<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountUpdate extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $avatar;
    public $roleId;
    public $adminID;
    public $imageUpdate;

    protected $listeners = [
        'changeRole' => 'updateRoleId',
        'changeImage' => 'updateThumbnail',
    ];

    public function render()
    {
        $roles = Role::query()->get();

        return view('livewire.admin.account.account-update', [
            'roles' => $roles
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $admin = Admin::query()->find($id);
        if ($admin) {
            $this->name = $admin->name;
            $this->phone = $admin->phone;
            $this->imageUpdate = $admin->avatar;
            $this->email = $admin->email;
            $this->roleId = $admin->role_id;
            $this->status = $admin->status;
            $this->adminID = $admin->id;
        }
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
                'unique:admins,email,'.$this->adminID
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
    }

    public function update()
    {
        if (!checkPermission('account-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate();

        try {

            $image = $this->imageUpdate;

            if ($this->avatar) {
                $image = $this->avatar;
            }

            Admin::where('id', $this->adminID)->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'avatar' => $image,
                'role_id' => $this->roleId,
            ]);

            session()->flash('success', 'Cập nhật thành công');

            return redirect()->route('admin.account');
        }catch (\Exception $e) {
            Log::error('Error update account', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Cập nhật thất bại!']);
        }
    }

    public function clearImagePreview()
    {
        $this->avatar = '';
    }
}
