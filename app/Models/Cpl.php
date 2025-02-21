<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    public function profil_cpls(): hasMany
    {
        return $this->hasMany(ProfilCpl::class);
    }
}
