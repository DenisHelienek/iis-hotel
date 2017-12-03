<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezervacia extends Model
{
	protected $table = 'REZERVACE';

	public function pokoj() {
		return $this->belongsTo('App\Pokoj');
	}
}
