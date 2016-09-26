<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public  function users(){
        /**
         * user_role', 'role_id', 'user_id' Dit is in de Role.php anders om
         */
        return$this->belongsToMany('App\user', 'user_role', 'role_id', 'user_id');
    }
}
