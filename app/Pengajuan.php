<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
