@foreach($roles as $role)
	<div class="checkbox">
		<label>
			<input name="roles[]" type="checkbox" value="{{ $role->name }}" 
			{{ $user->roles->contains($role->id) ? 'checked' : '' }}>
			{{ $role->name }}
		</label>
	</div>		
	<small class="text-muted">
			{{ $role->permissions->pluck('name')->implode(', ') }}
		</small>					
@endforeach