<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatatanJadwal extends Model
{
    protected $table = 'catatan_jadwal';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function penjadwalan(){
        return $this->belongsTo(Penjadwalan::class); 
    }
}
