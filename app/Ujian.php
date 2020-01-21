<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function Mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
