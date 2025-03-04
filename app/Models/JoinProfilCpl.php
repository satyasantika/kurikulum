<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JoinProfilCpl extends Model
{
    use HasFactory, HasUuids;

    public function profil()
    {
        return $this->belongsTo(Profil::class,'profil_id');
    }

    public function cpl()
    {
        return $this->belongsTo(Cpl::class,'cpl_id');
    }
}
