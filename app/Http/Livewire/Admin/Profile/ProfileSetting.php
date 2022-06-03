<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSetting extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $avatar;
    public $adminID;
    public $imageUpdate;

    protected $listeners = [
        'changeImage' => 'updateThumbnail',
        'closeModelReset' => 'closeModal',
    ];

    public function render()
    {
        return view('livewire.admin.profile.profile-setting')
            ->extends('admin.layouts.master')->section('content');
    }
    public function mount()
    {
        $admin = auth('admin')->user();
        if ($admin) {
            $this->name = $admin->name;
            $this->phone = $admin->phone;
            $this->imageUpdate = $admin->avatar;
            $this->email = $admin->email;
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
        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên tài khoản',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'avatar' => 'Ảnh đại diện',
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

    public function update()
    {
        if (!checkPermission('account-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
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
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Cập nhật thành công!']);

        }catch (\Exception $e) {
            Log::error('Error update account profile', [
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
