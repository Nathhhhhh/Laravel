<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utils;

class SuivisController extends Controller
{
    public function nouveau(){
        $utilsQuiVaSuivre = auth()->user();
        $utilsQuiVaEstSuivi = Utils::where('email',request('email'))->firstOrFail();
        
        $utilsQuiVaSuivre->suivis()->attach($utilsQuiVaEstSuivi);

        flash("Vous suivez maintenant {$utilsQuiVaEstSuivi->email}.")->success();

        return back();
    }
    public function enlever(){
        $utilsQuiSuit = auth()->user();
        $utilsQuiEstSuivi = Utils::where('email',request('email'))->firstOrFail();
        
        $utilsQuiSuit->suivis()->detach($utilsQuiEstSuivi);

        flash("Vous ne suivez plus {$utilsQuiEstSuivi->email}.")->success();

        return back();

    }
}
