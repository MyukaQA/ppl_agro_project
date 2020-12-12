<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatatanJadwal extends Model
{
    protected $table = 'catatan_jadwal';

    protected $guarded = ['id'];

    public function penjadwalan(){
        return $this->belongsTo(Penjadwalan::class); 
    }
}
