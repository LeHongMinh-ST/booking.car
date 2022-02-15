<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;

    protected $table = 'group_permissions';

    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'group_code', 'code');
    }

}
