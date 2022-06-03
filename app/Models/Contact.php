<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const STATUS = [
        'handle' => 1,
        'no_process' => 2
    ];

    public function scopeStatus($query, $status)
    {
        if ($status) {
            $query->where('status', $status);
        }
        return $query;
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function getStatusTextAttribute()
    {
        $status = "";

        switch ($this->status) {
            case self::STATUS['no_process']:
                $status = '<span class="badge badge-warning">Chưa xử lý</span>';
                break;

            case self::STATUS['handle']:
                $status = '<span class="badge badge-success">Đã xử lý</span>';
                break;
        }

        return $status;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('phone', 'LIKE', '%' . $search . '%')
                ->orWhere('subject', 'LIKE', '%' . $search . '%');
        }
        return $query;
    }
}
