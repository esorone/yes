<?php 

/*
|--------------------------------------------------------------------------
| Namespaces
|--------------------------------------------------------------------------
|
| De namespace maakt het mogelijk om de controller buiten deze pagina te gebruiken
| Je doet dan use App\http\Controller
*/

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;

/**
* getIndex, ga naar home
 *      # Proces variable data of parameters
 *      # Talk to the model
 *      # Recieve data from the model
 *      # Compile or proces data from model (if needed)
 *      # Pass that data to the correct view
 *      
 *      de ->with("titel" verwijst naar de $titel in de view en dan render $variabel naam in de view)
 *      public function getAbout(){
 *      $titel = "Over de App";
 *      $paragraaf = "| Lappen |";
 *      $full = $titel." ".$paragraaf;
 *      return view('pages.about')->with("titel", $full);
 *      MAG ook withTitle($full)  de with met variable in Hoofdletters.
 *      OOk een Array  werkt op deze wijze, alleen moet je de view dan aanpassen i.b.v.
 *      $data['firstname'];
 *      
*/
class PagesController extends Controller
{
    public function getIndex(){

        if(\Auth::check()) {

            //  doordat we de Post Model al gebruiken hoeven we de tabel niet perse aan te roepen
            // dit omdat de posts Model al de Posts Tabel gebruikt
            // Post:: is dus al eigenlijk "select * from posts"
            $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
            return view('pages.welcome')->withPosts($posts);
        }else{
            return redirect()->route('login');
        }
    }
    public function getAbout(){
        $first = 'Lennard';
        $last = 'Badart';
        $fullname = $first." ".$last;
        $betalen = 'Heb jij het geld';

        //return view('pages.about')->with("fullname", $full); Hieronder met 2 vars
        return view('pages.about')->withFullname($fullname)->withBetalen($betalen);
    }
    public function getContact(){
        return view('pages.contact');
    }

    public function getOops(){
        return view('pages.oops');
    }

    /**
     * @param Request $request
     * @return mixed Email versturen
     */
    public function postContact(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10']);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('hello@test.nl');
            $message->subject($data['subject']);
        });



        Session::flash('success', 'Your Email was Sent!');

        return redirect('/');
    }

}

