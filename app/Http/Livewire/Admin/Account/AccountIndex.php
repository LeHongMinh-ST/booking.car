<?php

namespace App\Http\Livewire\Admin\Account;

use Livewire\Component;

class AccountIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.account.account-index')->extends('admin.layouts.master')->section('content');
    }
}
