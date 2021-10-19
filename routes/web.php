<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UtilsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');   Pareil que au dessus
// });

// Route::view('/','welcome'); // On enlève



 Route::get('/bonjour/{nom}', function(){

 return view("bonjour",[

    'prenom' => request("nom"),
 ]);
});

 

Route::get('/inscription','InscriptionController@formulaire');
Route::post('/inscription','InscriptionController@traitement');


Route::get('/','UtilsController@liste');


Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

Route::group([
   'middleware' => 'App\Http\Middleware\Auth',

], function () {


 Route::get('/moncompte', [CompteController::class, 'accueil']);
 Route::get('/deconnexion', [CompteController::class, 'deconnexion']);
 Route::post('/modification-motdepasse', [CompteController::class, 'modificationMDP']);


 Route::post('/message', [MessageController::class, 'nouveau']);


});


Route::get('/{email}','UtilsController@voir'); // Il faut la mettre à la fin comme on utilise une variable pour la route