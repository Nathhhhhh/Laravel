<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utils;

class SuivisController extends Controller
{
    public function nouveau(){
        $utilsQuiVaSuivre = auth()->user();
        $utilsQuiEstSuivi = Utils::where('email',request('email'))->firstOrFail();
        
        $utilsQuiVaSuivre->suivis()->attach($utilsQuiEstSuivi);

        flash("Vous suivez maintenant {$utilsQuiEstSuivi->email}.")->success();

        return back();
    }
}
