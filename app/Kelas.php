<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['kode_kelas','nama_kelas','jurusan_id'];

	public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }
}