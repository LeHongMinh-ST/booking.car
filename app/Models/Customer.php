<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'person_id',
        'address',
        'permanent_residence',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customerOrders()
    {
        return $this->hasMany(CustomerOrder::class);
    }


    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('person_id', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('email', 'like', '%' . $search . '%');
                });
        }
        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if ($status) {
            $query->where('user_id', '<>', null)
                ->whereHas('user', function ($q) use ($status) {
                    $q->where('is_active', $status);
                });
        }
        return $query;
    }

    public function scopeUserId($query, $user)
    {
        if ($user == 1) {
            $query->where('user_id', '<>', null);
        }

        if ($user == 2) {
            $query->where('user_id', null);
        }
        return $query;
    }

}
