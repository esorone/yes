<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //user is automatisch users tabel, post -> posts. Maar stel
    //category ->categories dan moet je
    //protected $table is 'categories'

    public function posts(){
        //$this hasmany Post is een join leggen en koppelen aan Post Model
        // Daarna post model to belongsTo() the category model. (in Post Model
        return $this->hasMany('App\Post');
    }
}
