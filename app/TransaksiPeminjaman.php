<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiPeminjaman extends Model
{
    //
	protected $table = 'tr_peminjaman_barang';
	
	public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id');
    }
	
	public function peminjam()
    {
        return $this->belongsTo('App\Peminjam', 'peminjam_id');
    }
}
