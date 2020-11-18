<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'datatanaman';

    protected $guarded = ['id'];

    public function getImages(){
        if(!$this->images){
            return asset('images/tanaman/default.png');
        }

        return asset('images/tanaman/'.$this->images);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function penjadwalan(){
        return $this->hasMany(Penjadwalan::class);
    }
}
