<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objednavka extends Model
{
    protected $table = 'OBJEDNAVKA';

    public function rezervacie()
    {
        return $this->hasMany('App\Rezervacia', 'objednavka_id', 'vs');
    }
}