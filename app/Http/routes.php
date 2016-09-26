<?php

/**
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * PagesContoller@getContact
 * Ga naar de PagesContoller @ pak de functie getContact
 * This route group applies the "web" middleware group to every route
 * it contains. The "web" middleware group is defined in your HTTP
 * kernel and includes session state, CSRF protection, and more.
 */

    //Admin route:
//admin route:
Route::get('admin/profile', ['middleware' => ['auth', 'admin'], function () {
    // this page requires that you be logged in AND be an Admin


    // return view( ... );


}]);



//auth route:
    Route::get('auth/login', ['uses' =>'Auth\AuthController@getLogin', 'as' => 'login',]);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', ['uses' =>'Auth\AuthController@logout', 'as' => 'logout',]);

 
    // Registratie route:
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


    //Wachtwoord reset
    /**
     * De ? bij {token} geeft aan dat de het voor kan komen dat iemand geen token heeft
     * dus route password/reset gaat dan actief
     */

    //Haal het wachtwoord + token op
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    //Verstuurd ene resetlinkemail
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    //post het nieuwe wachtwoord richting DB
    Route::post('password/reset', 'Auth\PasswordController@reset');

    // Profile

    Route::get('profile/profile', ['uses' => 'UserController@show', 'as' => 'profile.show']);
    Route::post('profile/profile', ['uses' => 'UserController@edit', 'as' => 'profile.edit']);


//     Route van de Categorieen
//     De   Route::resources maakt eigenlijk direct alle routes van de GRUD
//     De expert geef je aan omdat je geen categorie.create wilt hebben. Deze hebben
//     we niet in controller gebruikt
    Route::resource('categorieen', 'CategorieController', ['except' => ['create']]);

// Commments ( post_id is van de post)

    Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}',  ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}',  ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}',  ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete',  ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);




//    domain.con/activiteit/slug-moet-hier
//     {slug} is een var dit in de ActiviteitenController@getSingle vast gelegd wordt
//     de 'uses' is echt bedoeld als ""gebruikt. Dus activitei.singel gebruikt ......
//     [\w\d\-\_]+ is een RegEx
    Route::get('activiteit/{id}', ['uses' => 'ActiviteitController@getSingle', 'as' => 'activiteit.single',]);
    Route::get('activiteit', ['uses' => 'ActiviteitController@getIndex', 'as' => 'activiteit.index']);



    Route::get('/contact', 'PagesController@getContact');
    Route::post('/contact', 'PagesController@postContact');

    Route::get('/about', 'PagesController@getAbout');
    Route::get('/oops', 'PagesController@getOops');
    Route::get('/', 'PagesController@getIndex');
//    Route::get('/', function(){
//
//    });

/**
 * De Route::resource is een default waarde die
 * direct begrijpt dat alle CRUD van toepassing zijn
 * Dit in tegenstelling tot het voorbeeld van hierboven.
 * Zie de PostController
 * anders zou je veel meer moeten tikken:
 * App\Http\Controllers\PostController@index
 * App\Http\Controllers\PostController@create
 * App\Http\Controllers\PostController@update
 * etc
 * posts is wel een route dan dan wordt het bv post.destroy
 * posts.update etc
 */
Route::resource('posts', 'PostController');


