<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tanaman(){
        return $this->belongsTo(Tanaman::class); 
    }

    public function catatan(){
        return $this->hasMany(CatatanJadwal::class); 
    }
}
