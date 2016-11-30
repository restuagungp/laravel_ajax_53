<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
 	protected $table = 'kendaraans';
	public $timestamps = true;
	public $fillable = ['jenis','nama','harga','file'];
}
