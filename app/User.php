<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role','name', 'avatar', 'alamat', 'telepon', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    public function getAvatars(){
        if(!$this->avatar){
            return asset('images/profile/default.png');
        }

        return asset('images/profile/'.$this->avatar);
    }

    public function forum(){
        return $this->hasMany(Forum::class);
    }

    public function penjadwalan(){
        return $this->hasMany(Penjadwalan::class);
    }

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class);
    }
}
 