<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'logo', 
        'website',
       ];
}
