<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cpl extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function join_profil_cpls()
    {
        return $this->hasMany(ProfilCpl::class);
    }

    public function join_cpl_mks()
    {
        return $this->hasMany(JoinCplMk::class);
    }
}
