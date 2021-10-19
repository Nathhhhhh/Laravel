@extends('layout')

@section('contenu')


<div class="section">
    <h1 class="title is-l"> Bonjour ! </h1>
    <ul>
        @foreach ($utils as $utils )
            <li>
                <a href="/{{ $utils -> email}}"> {{ $utils -> email}}</a>
            </li>
        @endforeach

    </ul>
</div>

@endsection