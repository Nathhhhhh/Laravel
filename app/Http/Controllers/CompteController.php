<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil(){

       

        if(auth()->guest()){
            flash('Veuillez vous connectez pour accéder à cette page')->error();
            return redirect('/connexion');
        }
        return view('moncompte');
    }

    public function deconnexion(){

        auth()->logout();
        flash('Vous êtes bien déconnecté.')->success();
        return redirect('/');
    }

    public function modificationMDP(){

        if(auth()->guest()){
            flash('Veuillez vous connectez pour accéder à cette page')->error();
            return redirect('/connexion');
        }

        request()->validate([
            'password'=>['required','confirmed','min:5'],
            'password_confirmation'=>['required'],
        ]);
        // $utilisateur = auth()->user();
        // $utilisateur -> mot_de_passe = bcrypt(request('password')); Pareil que en dessous
        // $utilisateur -> save();

        auth()->user()->update([

            "mot_de_passe"=> bcrypt(request('password')) ,
        ]);

        flash('Le mot de passe à bien été modifier')->success();

        return(redirect('/moncompte'));
    }
    
}
