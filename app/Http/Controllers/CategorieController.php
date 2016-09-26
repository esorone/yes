<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;


class CategorieController extends Controller
{


    public function __construct(){
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // laat een view zien met alle categorien

        $categorieen = Categorie::all();

        return view('categorieen.index')->withcategorieen($categorieen);

        // In dit formulier ook een form om een nieuw categorie aan te maken.
        //Doordat we create categorie op de index pagina laten zien
        // hoef je niet de  public function create() te gebruiken
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
           'name' => 'required|max:255|unique:categories'
        ));

        $categorie = new Categorie;
        $categorie->name = $request->name;
        $categorie->save();

        Session::flash('success','Categorie met succes opgeslagen');
        return redirect()->route('categorieen.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);

        $categorie->delete();

        Session::flash('success', 'De categorie is succesvol verwijderd!');
        return redirect()->route('categorieen.index');
    }

    
}
