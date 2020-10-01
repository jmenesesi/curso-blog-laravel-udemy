@extends('admin.layout')

@section('content')
<section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Página no autorizada</h1>
			<p><span class="text-danger">{{ $exception->getMessage() }}</span></p>
			<br>
			<p><a class="btn btn-secondary" href="{{ url()->previous() }}">Regresar</a></p>
		</div>
	</section>
@stop
