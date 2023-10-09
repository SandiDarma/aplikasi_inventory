<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = "detailpinjam";
    protected $fillable = ['inventaris_id', 'jumlah'];

    public function barang()
    {
        return $this->belongsTo('App\Inventaris', 'inventaris_id');
    }

}
