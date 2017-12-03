<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezervacia extends Model
{
	protected $table = 'REZERVACE';
    protected $fillable = ['id', 'objednavka_id', 'pokoj_id', 'rezervace_od', 'rezervace_do', 'pocet_osob' ];

	public function pokoj() {
		return $this->belongsTo('App\Pokoj');
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
