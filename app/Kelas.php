<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
