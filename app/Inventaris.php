<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = "inventaris";
    protected $fillable = ['nama_inventaris','kondisi','keterangan','jumlah','jenis_id','tanggal_register','ruang_id','kode_inventaris','users_id'];

    public function jenis()
    {
        return $this->belongsTo('App\Jenis');
    }
    public function ruang()
    {
        return $this->belongsTo('App\Ruang');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function detailpinjam()
    {
        return $this->hasMany('App\DetailPinjam');
    }
}
