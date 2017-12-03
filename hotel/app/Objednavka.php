<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objednavka extends Model
{
    protected $table = 'OBJEDNAVKA';
    protected $fillable = ['vs', 'vytvoreni_objednavky', 'konecna_cena' ,'host_id' ];

    public function rezervacie()
    {
        return $this->hasMany('App\Rezervacia', 'objednavka_id', 'vs');
    }

	public function setUpdatedAt($value)
	{
	    // Do nothing.
	}

	public function setCreatedAt($value)
	{
	    // Do nothing.
	}
}