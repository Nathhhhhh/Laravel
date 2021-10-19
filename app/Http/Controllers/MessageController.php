<?php

namespace App\Http\Controllers;

use App\Models\Message; // Il faut importer message ici

class MessageController extends Controller
{
    public function nouveau(){
        request()->validate([
            'message'=>['required'],
        ]);

        auth()->user()->messages()->create([
            'contenu'=> request('message'),
        ]);

        // Message::create([
        //     'utils_id'=>auth()->user()->id ,   --> la même que au dessus 
        //     'contenu'=> request('message'),
        // ]);
        flash('Votre message a bien été envoyé.')->success();
        return back();
    }
}
