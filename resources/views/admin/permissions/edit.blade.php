@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h5 class="card-title">Actualizar permiso</h5>
			</div>
			<div class="card-body">
				@include('partials.error-messages')

				<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="name">Identificador</label>
						<input type="text" name="name" value="{{ old('name', $permission->name) }}" class="form-control" {{ $permission->id !== null ? 'disabled' : '' }}>
					</div>
					<div class="form-group">
						<label for="display_name">Nombre</label>
						<input type="text" name="display_name" value="{{ old('display_name', $permission->display_name)}}" class="form-control">
					</div>
					<div class="form-group">
						<label for="guard_name">Guard</label>
						
						<select class="form-control" id="guard_name" name="guard_name" value="{{ old('guard_name', $permission->guard_name)}}" class="form-control">
							@foreach(config('auth.guards') as $guardName => $guard)
								<option value="{{$guardName}}" {{ old('guard_name', $permission->guard_name) === $guardName ? 'selected' : ''}}>{{ $guardName }}</option>
							@endforeach
						</select>
					</div>
					<button class="btn btn-primary btn-block">Actualizar permiso</button>
				</form>
			</div>
        </div>
	</div>
</div>

@endsection