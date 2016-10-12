<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Session;
use Auth;

use App\Http\Requests;

class CommentsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
//        $this->middleware('auth', ['except' => 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {



        $this->validate($request, array(
            'aanwezig' => 'required',
            'comment' =>  'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);
        $user= auth()->id();


        $comment = new Comment();
        $comment->aanwezig = $request->aanwezig;
        $comment->comment = $request->comment;
        $comment->post()->associate($post);
        $comment->user()->associate($user);


        $comment->save();

        Session::flash('success', 'Bericht goed opgeslagen');
        return redirect()->route('activiteit.single', [$post->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $user= auth()->id();
        $comment = Comment::find($id);
            return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000',
            'aanwezig' => 'required'
        ));

        $comment->aanwezig = $request->aanwezig;
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Reactie is aangepast');
        return redirect()->route('activiteit.single', $comment->post->id);

    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id; // hier pak je voor dat je het delete nog even de post_id voor de return view
        $comment->delete();

        Session::flash('success', 'Reactie is verwijderd');
        return redirect()->route('activiteit.single', $post_id);
    }

     public function getEdit($id)
  {
    // 1st # Fetch the post with something like this:
    $comment      = $this->comment->findOrFail($id); // maybe this will not work for you, try to implement your own method here

    // 2nd # Here is how you do the trick
    // validate that the user updating the post is the post author:
    if ( ! $comment->isTheOwner(Auth::user())) return \Redirect::to('/');

    // 3rd # Return the view with the post array

  }

}

