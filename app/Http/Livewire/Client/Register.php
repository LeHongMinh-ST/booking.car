<?php

namespace App\Http\Livewire\Client;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $phone;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.client.register');
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
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!preg_match("/^[0-9]{10}$/", $value)) {
                        return $fail('Trường số điện thoại gồm 10 chữ số ');
                    }
                }
            ],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];
    }

    protected $validationAttributes = [
        'name' => 'Tên tài khoản',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Xác nhận mật khẩu'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->is_active = User::IS_ACTIVE['active'];
            $user->save();

            $customer = new Customer();
            $customer->name = $this->name;
            $customer->email = $this->email;
            $customer->phone = $this->phone;
            $customer->user_id = $user->id;
            $customer->save();

            session()->flash('success', [
                'message' => 'Đăng ký tài khoản thành công',
                'title' => 'Thành công'
            ]);

            DB::commit();

            $this->redirect(route('login.form'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error register customer', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            $this->dispatchBrowserEvent('alertRegisterError',
                ['type' => 'error', 'message' => 'Đăng ký thất bại!']);
        }
    }
}
