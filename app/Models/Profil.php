<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id');
    }

    public function profil_indikators(): hasMany
    {
        return $this->hasMany(ProfilIndikator::class);
    }

    public function profil_cpls(): hasMany
    {
        return $this->hasMany(ProfilCpl::class);
    }
}
