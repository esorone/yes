<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    //Om eigen post te kunnen editten
     public function isTheOwner($user)
  {
    return $this->user_id === $user->id;
  }


}
