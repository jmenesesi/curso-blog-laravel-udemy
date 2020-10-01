@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h5 class="card-title">Datos personales</h5>
			</div>
			<div class="card-body">
				@include('partials.error-messages')
				<form method="POST" action="{{ route('admin.users.store') }}">
					{{ csrf_field() }}
					{{ method_field('POST') }}
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" name="name" value="{{ old('name')}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" name="email" value="{{ old('email')}}" class="form-control">
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>Roles</label>
							@include('admin.roles.checkboxes')
						</div>
						<div class="form-group col-md-6">
							<label>Permisos</label>
							@include('admin.permissions.checkboxes', [
								'model' => $user
							])
						</div>
					</div>
					
					<span class="help-block text-muted">La contraseña será enviada vía e-mail</span>
					<button class="btn btn-primary btn-block">Crear usuario</button>
				</form>
			</div>
        </div>
	</div>
</div>

@endsection