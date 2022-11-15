<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPermohonan extends Model
{
    //
	protected $table = 'tr_permohonan_peminjaman';
	
	public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }
	
	public function refpeminjam()
    {
        return $this->belongsTo('App\RefPeminjam', 'refpeminjam_id');
    }
}
