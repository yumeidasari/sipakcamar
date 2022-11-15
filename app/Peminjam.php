<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'ms_peminjam';
	
	public function kategoripeminjam()
    {
        return $this->belongsTo('App\RefPeminjam', 'kategori_peminjam_id');
    }
}
