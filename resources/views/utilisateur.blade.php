@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class="title is-l level">  
            <div class="level-left">
                <div class="level-item">
                {{$utils->email}} {{-- On a accès à  $utils car on l'a passé en param dans UtilsController--}}
            </div>
            @auth
                <form action="/{{$utils->email}}/suivis" method="post" class="level-item">
                   @csrf
                    @if (auth()->user()->suit($utils))
                    @method('delete')
                    {{-- @else
                    {{method_field('post')}} --> On peut mettre cette ligne mais comme dans la methode dans le form est post pas besoin--}}
                    @endif
                    <button type="submit" class="button is-info">
                        @if (auth()->user()->suit($utils))
                            Ne plus suivre
                        @else
                            Suivre
                        @endif
                        
                        </button>
                </form>
            @endauth
            </div>
        </h1> 

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