<?php

namespace App\Http\Controllers;

use App\Models\Utils;
use App\Models\Message;

class UtilsController extends Controller
{
    public function liste(){
        
        $utils = Utils::all(); 
        return view('utilisateurs',[
            'utils'=> $utils, 
        ]);

    }

    public function voir(){
        $email = request('email');
        $utils = Utils::where('email',$email)->firstOrFail();
        // $messages = $utils -> messages; // On récupère tout les messages


        return view('utilisateur',[

            'utils' => $utils,
            // 'messages' => $messages, 
        ]);
    }


}
