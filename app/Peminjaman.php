<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
	protected $table = "peminjaman";
    protected $fillable = ['tanggal_pinjam','tanggal_kembali','status','pegawai_id'];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai');
    }


}
