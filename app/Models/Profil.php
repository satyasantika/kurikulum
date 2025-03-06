<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class,'kurikulum_id');
    }

    public function profil_indikators()
    {
        return $this->hasMany(ProfilIndikator::class);
    }

    public function profil_cpls()
    {
        return $this->hasMany(ProfilCpl::class);
    }
}
