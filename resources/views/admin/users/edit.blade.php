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
				<form method="POST" action="{{ route('admin.users.update', $user) }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" name="name" value="{{ old('name', $user->name)}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" name="email" value="{{ old('email', $user->email)}}" class="form-control">
					</div>

					<div class="form-group">
						<label for="password">Contraseña</label>
						<input type="password" name="password" class="form-control" placeholder="Contraseña">
						<span class="help-block text-muted">Dejar en blanco si no quieres cambiar la contraseña</span>
					</div>

					<div class="form-group">
						<label for="password_confirmation">Repite la contraseña</label>
						<input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
					</div>

					<button class="btn btn-primary btn-block">Actualizar usuario</button>
				</form>
			</div>
        </div>
	</div>
	<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h5 class="card-title">Roles</h5>
			</div>
			<div class="card-body">
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
						{{ csrf_field() }} {{ method_field('PUT') }}
						@include('admin.roles.checkboxes')
						<hr>
						<button class="btn btn-primary btn-block">Actualizar roles</button>
					</form>
				@else
					<ul class="list-group">
						@forelse($user->roles as $role)
							<li class="list-group-item">{{ $role->name}}</li>
							@empty
								<li class="list-group-item">No tiene roles asignados</li>
						@endforelse
					</ul>
				@endrole
			</div>
		</div>

		<div class="card card-primary card-outline">
			<div class="card-header">
				<h5 class="card-title">Permisos</h5>
			</div>
			<div class="card-body">
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
						{{ csrf_field() }} {{ method_field('PUT') }}
						@include('admin.permissions.checkboxes', [
								'model' => $user
							])
						<hr>
						<button class="btn btn-primary btn-block">Actualizar permisos</button>
					</form>
				@else
					<ul class="list-group">
						@forelse($user->permissions as $permission)
							<li class="list-group-item">{{ $permission->name}}</li>
							@empty
								<li class="list-group-item">No tiene permisos adicionales</li>
						@endforelse
					</ul>
				@endrole
			</div>
		</div>
	</div>
</div>
@endsection