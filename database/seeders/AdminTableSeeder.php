<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::checkIssetBeforeCreate([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'phone' => '0974798960',
            'status' => Admin::STATUS['active'],
            'password' => Hash::make('123456789'),
        ]);
    }

    public function checkIssetBeforeCreate($data)
    {
        $admin = Admin::where('email', $data['email'])->first();
        if (empty($admin)) {
            Admin::create($data);
        } else {
            $admin->update($data);
        }
    }
}
