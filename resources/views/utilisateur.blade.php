@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class="title is-l"> {{$utils -> email}} </h1> {{-- On a accès à  $utils car on l'a passé en param dans UtilsController--}}

        @if (auth()->check() AND auth()->user()->id=== $utils ->id)
            

        <form action="/message" method="post">
        
        {{@csrf_field()}}

        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" name="message" placeholder="Qu'avez-vous à dire ?"></textarea>

            </div>
            @if ($errors->has('message'))

            <p class="help is-danger">{{$errors->first('message')}}</p>
                
            @endif
        </div>

            <div class="field">
                <div class="control">
                    <button class="button is-link" type="submit">Publier</button>
                </div>
            </div>


       
        
        </form>

        @endif
        @foreach ($utils->messages as $message)
        <hr>
        <p>
            <strong>{{$message->created_at}}</strong><br>
            {{$message->contenu}}

        </p>

            
        @endforeach
    </div>

@endsection