@component('mail::message')
<h1>Olá {{$user->name}}</h1>
<p>{{$user->corpo_email}}</p>
@endcomponent