<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <nav class="navbar is-dark">
            <div class="navbar-menu">   
                <div class="navbar-start">
                   
                    @include('partials.navbar-item',['lien'=>'/', 'texte'=>'Accueil'])
                    {{-- à la place de  @if (auth()->check()) --}}
                    @auth 
                    @include('partials.navbar-item',['lien'=>auth()->user()->email, 'texte'=>auth()->user()->email])
                    @endauth
                </div>
                <div class="navbar-end">
                    @auth
                
                    @include('partials.navbar-item',['lien'=>'moncompte', 'texte'=>'Mon compte'])
                    @include('partials.navbar-item',['lien'=>'deconnexion', 'texte'=>'Déconnexion'])
                    @else

                    @include('partials.navbar-item',['lien'=>'connexion', 'texte'=>'Connexion'])
                    @include('partials.navbar-item',['lien'=>'inscription', 'texte'=>'Inscription'])
                    @endauth
                    
                </div>
                


            </div>
        </nav>



        <div class="container">
            @include('flash::message')

            @yield('contenu')
        </div>

    </body>
    </html>