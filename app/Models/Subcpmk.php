<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcpmk extends Model
{
    use HasFactory;

    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class,'cpmk_id');
    }

    public function pertemuans(): hasMany
    {
        return $this->hasMany(Pertemuan::class);
    }
}
