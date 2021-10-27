<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauSuiveurMail extends Mailable
{
    use Queueable, SerializesModels;
    public $suiveur; // public car la fonction view va prendre en paramètre les variables public (et non private) grâce a Mailable


    public function __construct($suiveur)
    {
        $this->suiveur = $suiveur;
    }


    public function build()
    {
        return $this->subject('Vous avez un nouveau follower !')->markdown('mails.nouveau_suiveur');//Dans le dossier mail
    }
}
