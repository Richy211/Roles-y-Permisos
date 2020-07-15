<?php

namespace App\RicardoPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //es:desde aqui

    protected $fillable = [
        'name','slug','description','full-access',
    ];

    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }
    public function permissions(){
        return $this->belongsToMany('App\RicardoPermission\Models\Permission')->withTimesTamps();
    }
}
