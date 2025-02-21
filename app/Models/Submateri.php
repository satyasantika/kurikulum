<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submateri extends Model
{
    use HasFactory;

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class,'pertemuan_id');
    }
}
