<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kuliah extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function subcpmk()
    {
        return $this->belongsTo(Subcpmk::class,'subcpmk_id');
    }

    public function submateris()
    {
        return $this->hasMany(Submateri::class);
    }

    public function kuliah_berkass()
    {
        return $this->hasMany(KuliahBerkas::class);
    }

    public function kuliah_evaluasi()
    {
        return $this->hasMany(KuliahEvaluasi::class);
    }

    public function kuliah_bentuks()
    {
        return $this->hasMany(KuliahBentuk::class);
    }
}
