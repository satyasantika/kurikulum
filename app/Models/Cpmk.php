<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cpmk extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function mk()
    {
        return $this->belongsTo(Mk::class,'mk_id');
    }

    public function subcpmks()
    {
        return $this->hasMany(Subcpmk::class);
    }
}
