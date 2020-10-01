@extends('admin.layout')

@section('header')
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0 text-dark">Roles</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Inicio</a></li>
		      <li class="breadcrumb-item active">Roles</li>
		    </ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	</div>
@stop

@section('content')

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Listado de roles</h3>
	  @can('create', $roles->first())
		  <a href="{{ route('admin.roles.create') }}" class="btn btn-primary float-right">
	        <i class="fa fa-plus nav-icon"></i>
	        Agregar rol
	      </a>
      @endcan
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="roles-table" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>ID</th>
	      <th>Identificador</th>
	      <th>Nombre</th>
	      <th>Guard</th>
	      <th>Acciones</th>
	    </tr>
	    </thead>
	    <tbody>
    	@foreach($roles as $role)
    		<tr> 
    			<td>{{ $role->id }}</td>
    			<td>{{ $role->name }}</td>
    			<td>{{ $role->display_name }}</td>
    			<td>{{ $role->guard_name }}</td>
    			<td>
    				@can('update', $role)
    					<a href="{{ route('admin.roles.edit', $role)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
    				@endcan
    				@can('delete', $role)
    				@if($role->id !== 1)
    				<form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline;">
    					{{csrf_field()}} {{method_field('DELETE')}}

    					<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro que deseas eliminar el rol?')"><i class="fa fa-trash"></i></button>
    				</form>
    				@endif
    				@endcan
    			</td>
    		</tr>
    	@endforeach
    	</tbody>
	    <tfoot>
	    <tr>
	     <th>ID</th>
	     <th>Identificador</th>
	      <th>Nombre</th>
	      <th>Guard</th>
	      <th>Acciones</th>
	    </tr>
	    </tfoot>
	  </table>
	</div>
	<!-- /.card-body -->
	</div>
@stop

@push('styles')
	<!-- DataTables -->
  	<link rel="stylesheet" href="/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

@push('scripts')
	<!-- DataTables -->
	<script src="/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
	<script src="/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script>
	  $(function () {
	    $('$roles-table').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false,
	    });

	  });

	</script>
@endpush