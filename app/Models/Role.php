<?php

namespace App\Models;

use Spatie\Permission\Models\Role as RoleSpatie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends RoleSpatie
{
    use HasFactory;
}
