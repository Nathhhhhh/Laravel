@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class="title is-l">  
               Actualités
        </h1> 

        @foreach ($messages as $message)
        <hr>
        <p>
            <strong>{{$message->created_at}}</strong><br>
            {{$message->contenu}}

        </p>

            
        @endforeach
    </div>

@endsection