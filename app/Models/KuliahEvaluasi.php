<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KuliahEvaluasi extends Model
{
    use HasFactory, HasUuids;

    public function kuliah()
    {
        return $this->belongsTo(Kuliah::class,'kuliah_id');
    }
}
