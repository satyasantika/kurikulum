<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    use HasFactory;

    public function cpl_bk()
    {
        return $this->belongsTo(CplBk::class,'cpl_bk_id');
    }

    public function subcpmks(): hasMany
    {
        return $this->hasMany(Subcpmk::class);
    }
}
