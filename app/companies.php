<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Companies extends Model
{
  
    protected $fillable = [
        'nama',
        'email',
        'logo', 
        'website',
       ];

       public function get_employes(){  
        return $this->hasMany(Employees::class, 'company', 'id');  
    }
}
