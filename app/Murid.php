<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function ujians()
    {
        return $this->hasMany(Ujian::class);
    }
}
