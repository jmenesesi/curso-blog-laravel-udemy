<div class="form-group">
	<label for="name">Identificador</label>
	<input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control" {{ $role->id !== null ? 'disabled' : '' }}>
</div>
<div class="form-group">
	<label for="display_name">Nombre</label>
	<input type="text" name="display_name" value="{{ old('display_name', $role->display_name)}}" class="form-control">
</div>
<div class="form-group">
	<label for="guard_name">Guard</label>
	
	<select class="form-control" id="guard_name" name="guard_name" value="{{ old('guard_name', $role->guard_name)}}" class="form-control">
		@foreach(config('auth.guards') as $guardName => $guard)
			<option value="{{$guardName}}" {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : ''}}>{{ $guardName }}</option>
		@endforeach
	</select>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label>Permisos</label>
		@include('admin.permissions.checkboxes', [
			'model' => $role
		])
	</div>
</div>