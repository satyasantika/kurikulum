<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bk extends Model
{
    use HasFactory;

    public function cpl_bks(): hasMany
    {
        return $this->hasMany(CplBk::class);
    }
}
