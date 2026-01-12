<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';
    protected $guarded = [];

    public $timestamps = false;

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }
}
