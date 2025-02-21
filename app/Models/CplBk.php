<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CplBk extends Model
{
    use HasFactory;

    public function profil_cpl()
    {
        return $this->belongsTo(ProfilCpl::class,'profil_cpl_id');
    }

    public function bk()
    {
        return $this->belongsTo(Bk::class,'bk_id');
    }

    public function mks(): hasMany
    {
        return $this->hasMany(Mk::class);
    }

}
