<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    public function subcpmk()
    {
        return $this->belongsTo(Subcpmk::class,'subcpmk_id');
    }

    public function submateris(): hasMany
    {
        return $this->hasMany(Submateri::class);
    }

    public function berkas_pembelajarans(): hasMany
    {
        return $this->hasMany(BerkasPembelajaran::class);
    }
}
