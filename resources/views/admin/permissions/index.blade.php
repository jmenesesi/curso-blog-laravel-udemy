@extends('admin.layout')

@section('header')
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0 text-dark">Permisos</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Inicio</a></li>
		      <li class="breadcrumb-item active">Permisos</li>
		    </ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	</div>
@stop

@section('content')

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Listado de permisos</h3>
	  
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="permissions-table" class="table table-bordered table-striped">
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
    	@foreach($permissions as $permission)
    		<tr> 
    			<td>{{ $permission->id }}</td>
    			<td>{{ $permission->name }}</td>
    			<td>{{ $permission->display_name }}</td>
    			<td>{{ $permission->guard_name }}</td>
    			<td>
    				<a href="{{ route('admin.permissions.edit', $permission)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
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
	    $('$permissions-table').DataTable({
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