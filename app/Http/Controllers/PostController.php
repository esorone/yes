<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use App\Categorie;

class PostController extends Controller
{

    /**
     * Voordat de postController gebruikt mag worden, wordt er eerst gecheckt of iemand
     * ingelogd is. Dit doe je d.m.v. de Middleware oplossing
     *         $this->middleware('auth') is alleen ingelogd
     *         $this->middleware('guest') is alleen gasten
     *
     * AUTORISATIE CHECKS:
     * Andere optie is public function guest() of public function check(),
     * public function user(), public function id() <- is id van user
     *
     */

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //creer een variable en plaats deze in de database
        // $posts = Post::all(); of $posts = Post::paginate(5);
        // Nu met pagination

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // return een view en pars de bovengenoemde var
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //creeren van het create formulier
        /**
         * Categorieen is de lijst van alle categorieen die we willen laten zien
         */

        $categorieen = Categorie::all();
        return view('posts.create')->withCategorieen($categorieen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // name space use App\Post (is PostModel)
        // valideer de data (standaard in MODEL)
        // store vanuit het formulier die bij create gemaakt is.
        $this->validate($request, array(
                'title' => 'required|max:250',
                'date' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
                'categorie_id' => 'required|integer',
                'body' => 'required',

            ));

        // store in de database en flash een melding via sessie
        $post = new Post;
        $post->title = $request->title;
        $post->date = $request->date;
        $post->categorie_id = $request->categorie_id;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        // ook use session
        Session::flash('success', 'De activiteit is opgeslagen!');

        // redirect naar een pagina en pak direct het ID van de post
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Check voor extra info laravel en dan eloquent
     * ::find kan alleen op een primary ID anders NIET
     * ->withPost($post); is een combinatie van: with('post', $post);
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit het formulier
        // vind het records en save het in een var
        $post = Post::find($id);
        $categorieen = Categorie::all();
        //return de view en pars de var van hierboven
        return view('posts.edit')->withPost($post)->withCategorieen($categorieen);
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
        //Valideer de ingevoerde waarden -> verstuur vanuit de edit form

        $post = Post::find($id);

        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'date' => 'required',
                'body'  => 'required',
                'categorie_id' => 'required|integer',
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'date' => 'required',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'categorie_id' => 'required|integer',
                'body'  => 'required'
            ));
        }

        // Save naar de db -> net iets anders dan een gewone post ivm $id. De timestamp wordt automatisch geupdate
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->date = $request->input('date');
        $post->categorie_id = $request->categorie_id;
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();

        // Set flashdata met succes bericht
        Session::flash('success', 'De activiteit is succesvol aangepast!');


        // Redirect met een flash -> posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'De activiteit is succesvol verwijderd!');
        return redirect()->route('posts.index');


    }
}
