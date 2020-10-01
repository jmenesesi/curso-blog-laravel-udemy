@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h5 class="card-title">Crear rol</h5>
			</div>
			<div class="card-body">
				@include('partials.error-messages')

				<form method="POST" action="{{ route('admin.roles.store') }}">
					{{ csrf_field() }}
					{{ method_field('POST') }}
					@include('admin.roles.form')
					<button class="btn btn-primary btn-block">Crear rol</button>
				</form>
			</div>
        </div>
	</div>
</div>

@endsection