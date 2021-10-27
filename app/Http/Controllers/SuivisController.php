<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utils;
use Illuminate\Support\Facades\Mail;
use App\Mail\NouveauSuiveurMail;

class SuivisController extends Controller
{
    public function nouveau(){
        $utilsQuiVaSuivre = auth()->user();
        $utilsQuiVaEtreSuivi = Utils::where('email',request('email'))->firstOrFail();
        
        $utilsQuiVaSuivre->suivis()->attach($utilsQuiVaEtreSuivi);

        Mail::to($utilsQuiVaEtreSuivi)->send(new NouveauSuiveurMail($utilsQuiVaSuivre));

        flash("Vous suivez maintenant {$utilsQuiVaEtreSuivi->email}.")->success();

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
