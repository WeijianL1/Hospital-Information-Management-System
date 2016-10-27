<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruyuanjilu extends Model
{
	protected $table='ruyuanjilus';
	public function hasOneBingren(){
		return $this->hasOne('Bingren','id','id');
	}
}
