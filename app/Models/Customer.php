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
        'person_id_address',
        'person_id_date',
        'address',
        'permanent_residence',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
