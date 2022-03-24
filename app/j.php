<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{

    Use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'logo', 
        'website',
       ];
}
