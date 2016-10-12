<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Auth;
use App\Comment as Comment;

use Illuminate\Support\Facades\DB;


class ActiviteitController extends Controller
{

    public function getIndex() {
        $posts = Post::orderBy('created_at', 'asc')->paginate(5);

        return view('activiteit.index')->withPosts($posts);
    }




    public function getSingle($id) {
        // fetch from the DB based on id
        $post = Post::where('id', '=', $id)->orderBy('updated_at', 'desc')->first();

         $aantallen = DB::table('comments')
             ->where('post_id', $id)
             ->where('aanwezig', 1)
             ->count(DB::raw('DISTINCT user_id'));

         // return the view and pass in the post object
         
         return view('activiteit.single')->withPost($post)->withAantallen($aantallen);
        
    }


    public function getUserComments() {


//        return view('activiteit.index')->withComment($comment);

    }



}
