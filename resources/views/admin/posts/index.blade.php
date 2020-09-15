@extends('admin.layout')

@section('header')
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
		    <h1 class="m-0 text-dark">Posts</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
		    <ol class="breadcrumb float-sm-right">
		      <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Inicio</a></li>
		      <li class="breadcrumb-item active">Posts</li>
		    </ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	</div>
@stop

@section('content')

<div class="card">
	<div class="card-header">
	  <h3 class="card-title">Listado de publicaciones</h3>
	  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newPostModal">
	  	<i class="fa fa-plus"></i> Crear publicación
	  </button>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
	  <table id="posts-table" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>ID</th>
	      <th>Titulo</th>
	      <th>Extracto</th>
	      <th>Acciones</th>
	    </tr>
	    </thead>
	    <tbody>
    	@foreach($posts as $post)
    		<tr>
    			<td>{{ $post->id }}</td>
    			<td>{{ $post->title }}</td>
    			<td>{{ $post->excerpt }}</td>
    			<td>
    				<a href="{{ route('post.show', $post)}}" target="blank" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
    				<a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
    				<form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline;">
    					{{csrf_field()}} {{method_field('DELETE')}}

    					<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro que deseas eliminar la publicación?')"><i class="fa fa-trash"></i></button>
    				</form>
    			</td>
    		</tr>
    	@endforeach
    	</tbody>
	    <tfoot>
	    <tr>
	     <th>ID</th>
	      <th>Titulo</th>
	      <th>Extracto</th>
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
	    $('#posts-table').DataTable({
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