<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }
}
