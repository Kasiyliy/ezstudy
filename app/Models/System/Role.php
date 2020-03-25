<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ROLE_ADMIN = 1;
    public const ROLE_USER = 2;

    protected $fillable = ['name'];
}
