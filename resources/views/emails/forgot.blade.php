@component('mail::message')
    Hello {{$user->name}}
    @component('mail::button',['url'=>url('reset/'.$user->remember_token)])
        Reset your password
    @endcomponent


    {{config('app.name')}}
@endcomponent
