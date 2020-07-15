<?php

namespace App\RicardoPermission\Traits;

trait UserTrait{


    public function roles(){

        return $this->belongsToMany('App\RicardoPermission\Models\Role')->withTimesTamps();
    }

    public function havePermission($permission){
        /* return 'prueba'; */

        foreach ($this->roles as $role ){

            if ($role['full-access'] == 'yes' ){
                return true;
            }

            foreach($role->permissions as $perm ){

                if ($perm->slug == $permission  ){
                    return true;
                }
            }
        }
        return false;
    }
}