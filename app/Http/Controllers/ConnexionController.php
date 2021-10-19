<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function formulaire(){


        return view('connexion');

    }

    public function traitement(){
        request() -> validate([

            'email'=>['required','email'], //Valider formulaire
            'password'=>['required'],
            
    
        ]);
        $resultat = auth()->attempt([
            'email' => request('email'), 
            'password' => request('password'), // On regarde si les champs correspondent à la bdd
        ]);

        if($resultat){
            flash('Vous êtes bien connecté.')->success();
            return redirect('/moncompte'); // Si oui on accède au compte
        }


       
        return back() -> withInput() ->withErrors([
            'email' => 'Vos identifiant ne sont pas valide',
        ]) ;
    }
}

