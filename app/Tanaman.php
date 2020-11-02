<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'datatanaman';

    protected $fillable = ['title', 'slug', 'content'];
}
