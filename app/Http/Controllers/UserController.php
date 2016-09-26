<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Post;
use Session;
use Image;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function show(){
        return view('profile/profile', array('user' => Auth::user()) );
    }


    public function edit(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($avatar)->save($location);
//            Image::make($avatar)->resize(100, 100)->save($location);


            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        Session::flash('success','Avatar is aangepast');
//        return view('profile/profile', array('user' => Auth::user()) );
        return redirect()->route('profile.show', array('user' => Auth::user()));

    }
}