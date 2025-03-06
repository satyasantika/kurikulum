<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JoinCplBk extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function cpl()
    {
        return $this->belongsTo(Cpl::class,'cpl_id');
    }

    public function bk()
    {
        return $this->belongsTo(Bk::class,'bk_id');
    }
}
