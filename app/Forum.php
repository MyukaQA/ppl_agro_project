<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';

    protected $guarded = ['id'];

    public function getImages(){
        if(!$this->images){
            return asset('images/forum/default.png');
        }

        return asset('images/forum/'.$this->images);
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }

}
