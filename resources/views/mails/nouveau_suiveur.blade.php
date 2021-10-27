

@component('mail::message')
{{-- Le # c'est pour faire un titre comme un h1 --}}
# Hey ! 
{{-- Fait des paragraphe tout seul grâce aux retours à la ligne --}}
**{{$suiveur->email}}** viens de vous follow !

@endcomponent