<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use App\Categorie;

/**
 * App\Post
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{

    // Post model to belongsTo() the categorie model.
    //$this hasmany Post moet je in de categorie model schrijven
    // in de view hoe je dan alleen $post->categorie->name }} aan de roepen en het werkt al :-)
    // Want Post Model is nu gelinkt aan categorie en kun je dit dus via $post aanroepen
    // Post Model -> Functionnaam dus categorie en dan de name van de db column

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }





}
