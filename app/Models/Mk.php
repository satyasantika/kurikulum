<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mk extends Model
{
    use HasFactory, HasUuids;

    public function bk()
    {
        return $this->belongsTo(Bk::class,'bk_id');
    }

    public function cpmks()
    {
        return $this->hasMany(Cpmk::class);
    }
}
