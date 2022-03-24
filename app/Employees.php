<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'nama',
        'company',
        'email',
       ];

    public function get_company(){  
        return $this->belongsTo(Companies::class, 'company');  
    } 
}
