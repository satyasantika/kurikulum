<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcpmk extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function cpmk()
    {
        return $this->belongsTo(Cpmk::class,'cpmk_id');
    }

    public function kuliahs()
    {
        return $this->hasMany(Kuliah::class);
    }
}
