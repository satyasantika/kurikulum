<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bk extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function join_cpl_bks()
    {
        return $this->hasMany(JoinCplBk::class);
    }

    public function mks()
    {
        return $this->hasMany(Mk::class);
    }
}
