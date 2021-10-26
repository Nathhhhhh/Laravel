@extends('layout')

@section('contenu')


<div class="section">
    <h1 class="title is-l"> Bonjour ! </h1>

    @auth

    <section class="section">
        <h2>Utilisateurs suivis </h2>

        <ul>
            {{-- J'avais mis $utils à la place de $util mais ça ne marchais pas car il prenait la variable qui est en paramètre (que je passe par UtilsController)
            forelse est l'équivalent de : auth()->user()->suivis->isEmpty() --}}
            @forelse (auth()->user()->suivis as $util) 
                <li>
                    <a href="/{{ $util->email}}"> {{ $util->email}}</a>
                </li>
            @empty
                Vous ne suivez aucun utilisateurs.  
            @endforelse
        </ul>
        
    </section>
        
    @endauth

    

    <section class="section">
        <h2> Tout les utilisateurs </h2>
        <ul>
            @foreach ($utils as $util )
                <li>
                    <a href="/{{ $util->email}}"> {{ $util->email}}</a>
                </li>
            @endforeach
        </ul>
    </section>

</div>

@endsection
