<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    public function liste(){
        $utils = \App\Models\Utils::all(); 

        return view('utilisateurs',[
            'utilisateurs'=> $utils, 
        ]);

    }
}
