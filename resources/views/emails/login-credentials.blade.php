@component('mail::message')
# Tus credenciales para acceder a {{ config('app.name')}}

Utiliza estas credenciales para ingresar al sistema.

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

@component('mail::table')
	| Username | Contraseña |
	|:----------|:------------|
	| {{ $user->email }} | {{$password}} |
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
