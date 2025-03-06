<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurikulum extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class,'prodi_id');
    }

    public function profils()
    {
        return $this->hasMany(Profil::class);
    }
}
