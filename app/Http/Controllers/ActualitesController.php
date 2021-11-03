<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function liste(){

        $messages = auth()->user()->suivis
        ->load('messages')// Permet de charger toutes les requêtes en même temps -> fait 1 requête SQL et pas 100 si on suivait 100 utilisateurs
        //->map->messages //On transforme chaque utilisateur en un tableau de message //C'est du laravel, on utilise l'attribut map et pas la fonction, ici après map c'est comme si on était sur l'utilisateur donc on peut mettre directement messages après
        ->flatMap->messages // Pour flat et map en même temps car courant
        // ->map(function($utils){

        //    return $utils->messages; Même chose que au-dessus

        // })
        //->flatten()    On récupère la liste de tout les messages c'est super courant donc on utilisa flatMap
        ->sortByDesc ->created_at;
        // ->sortByDesc(function($message){

        //     return $message->created_at; Même chose que au-dessus
        // });

        return view('actualites',[
            'messages'=>$messages,
        ]);
    }
}
