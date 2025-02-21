<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilCpl extends Model
{
    use HasFactory;

    public function profil()
    {
        return $this->belongsTo(Profil::class,'profil_id');
    }

    public function cpl()
    {
        return $this->belongsTo(Cpl::class,'cpl_id');
    }

    public function cpl_bks(): hasMany
    {
        return $this->hasMany(CplBk::class);
    }

}
