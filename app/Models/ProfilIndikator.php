<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilIndikator extends Model
{
    use HasFactory;

    public function profil()
    {
        return $this->belongsTo(Profil::class,'profil_id');
    }
}
