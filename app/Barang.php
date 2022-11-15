<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
	protected $table = 'ms_barang';
	
	public function jenisbarang()
    {
        return $this->belongsTo('App\JenisBarang', 'jenisbarang_id');
    }
}
